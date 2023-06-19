<?php
// if(isset($_GET['eventid'])){
//     $eventidupdated = $_GET['eventid'];

    // Handle feature image upload
    $extFI = $_FILES['feature_image_edit']['name'];
    $extSImgs=$_FILES['supporting_images_edit']['name'];
    $extSI ="";
    if(count($extSImgs)==1 && $extSImgs[0] == ""){
        $extSI ="";
    }else{
        $extSI ="1";
    }

    $featureImage = $_FILES['feature_image_edit'];
    $featureImageName = generateUniqueFilename($featureImage['name']);
    move_uploaded_file($featureImage['tmp_name'], './images/' . $featureImageName);

    // Handle supporting images upload
    
    $supportingImages = $_FILES['supporting_images_edit'];
    $supportingImageNames = [];
    $OriginalNames = [];

    foreach ($supportingImages['tmp_name'] as $key => $tmpName) {
        $originalname = $supportingImages['name'][$key];
        
        $bsame = false;
        $arrctr = count($supportingImageNames);
        for($x = 0; $x < $arrctr-1 ; $x++){
        
            if($OriginalNames[$x] == $originalname){
                $bsame=true;
            }
    
        }
        if($bsame == false) {
            $supportingImageName = generateUniqueFilename($supportingImages['name'][$key]);
            move_uploaded_file($tmpName, './images/' . $supportingImageName);
            $OriginalNames[] = $originalname;
            $supportingImageNames[] = $supportingImageName;
        }
        
    }
    
        date_default_timezone_set('Asia/Manila');
        $todays_date = date("y-m-d h:i:sa");
    session_start();
    
    $eventname = $_POST['eventname'];
    $speaker = $_POST['speaker'];
    $position = $_POST['position'];
    $eventtime = $_POST['eventtime'];
    $eventdate = $_POST['eventdate'];
    $editeventid = $_POST['editeventid'];
    $attendees = $_POST['attendees'];
    $venue = $_POST['venue'];
    $speakercontact = $_POST['speakercontact'];
    $speakeremail = $_POST['speakeremail'];
    $eventcreated = $todays_date;
    $eventupdated = $todays_date;
    $eventdesc = $_POST['eventdesc'];
    // Save filenames to the database
   
    $pdo = new PDO('mysql:host=localhost;dbname=u491894228_jcytf_db', 'u491894228_jcytf_user', 'HostingerAwesome123');

 //                  
    // feature image        1               1               0               0
    // supporting images    0               1               1               0
    // Result               update feature  all update      update supp     no updates

    if($extFI != "" && $extSI == ""){
        $stmt = $pdo->prepare('update tblevents set EventName=?, 
         Speaker=?, position=?, attendees=?, venue=?, contact=?, email=?, 
        Description=?, date=?, time=?, created_at=?, updated_at=?,featuredimage=? where md5(id)=?');
        $stmt->execute([$eventname, $speaker, $position, $attendees, $venue, 
        $speakercontact, $speakeremail, $eventdesc, $eventdate, $eventtime, 
        $eventcreated, $eventupdated,  $featureImageName, $editeventid]);

    }else if($extFI != "" && $extSI != ""){
            $stmt = $pdo->prepare('update tblevents set EventName=?, 
             Speaker=?, position=?, attendees=?, venue=?, contact=?, email=?, 
            Description=?, date=?, time=?, created_at=?, updated_at=?,
            featuredimage=?, pictures=?
            where md5(id)=?');
            $stmt->execute([$eventname, $speaker, $position, $attendees, $venue, $speakercontact, $speakeremail, $eventdesc, $eventdate, $eventtime, $eventcreated, $eventupdated,  $featureImageName, implode(',', $supportingImageNames), $editeventid]);
    }else if($extFI == "" && $extSI != ""){
        $stmt = $pdo->prepare('update tblevents set EventName=?, 
             Speaker=?, position=?, attendees=?, venue=?, contact=?, email=?, 
            Description=?, date=?, time=?, created_at=?, updated_at=?,
             pictures=?
            where md5(id)=?');
            $stmt->execute([$eventname, $speaker, $position, $attendees, $venue, $speakercontact, $speakeremail, $eventdesc, $eventdate, $eventtime, $eventcreated, $eventupdated, implode(',', $supportingImageNames), $editeventid]);
    }else if($extFI == "" && $extSI == ""){
        $stmt = $pdo->prepare('update tblevents set EventName=?, 
         Speaker=?, position=?, attendees=?, venue=?, contact=?, email=?, 
        Description=?, date=?, time=?, created_at=?, updated_at=?
        where md5(id)=?');
        $stmt->execute([$eventname, $speaker, $position, $attendees, $venue, $speakercontact, $speakeremail, $eventdesc, $eventdate, $eventtime, $eventcreated, $eventupdated, $editeventid]);
    }else{
        echo "error";
    }
    
if($stmt){
    // $dog = count($_FILES['feature_image']);
    // print_r($extSImgs );
    // echo $extSImgs[0];
    // echo count($extSImgs);
    // echo 'Event has been updated!' . $extSI;
    //  . $_FILES['feature_image']['name'];
}else{
    echo 'Error!';
}
    

    // Function to generate a unique filename
    function generateUniqueFilename($filename)
    {
        $extension = pathinfo($filename, PATHINFO_EXTENSION);                
        return uniqid() . '.' . $extension;
    }
    
// }else{
//     echo 'Error';
// }
?>

