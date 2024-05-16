<!DOCTYPE html>
<?php
include '../../php/variables.php';
// include '../../php/login.php';
include '../../php/config.php';

$officialResponse = "SELECT * FROM tbl_official";
$officialResponseResult = mysqli_query($conn, $officialResponse);
$officials = mysqli_fetch_all($officialResponseResult, MYSQLI_ASSOC);

?>
<html lang="en">
<style>

 
  /* #bg_logo {
    position: fixed;
    height: 150%;
    width:150%
    margin-top: -15%;
 
 

    transform: rotate(270deg);
  
    mix-blend-mode: multiply;

  } */

  .cert_border {
    /* position: fixed; */
    border: 2px solid black;
    padding: 100px;
    z-index: 100;
  }

  #print_btn {
    position: fixed;
    width: 150px;
    top: 95%;
    left: 98%;
    transform: translate(-98%, -95%);

    font-size: 20px;
  }

  #back_btn {
    position: fixed;
    width: 150px;
    top: 1%;
    left: 1%;
    transform: translate(-1%, -1%);

    font-size: 20px;
  }

  #header_logo {
    width: 100px;
    height: 100px;
    border-radius: 0px;
  }

  #header_logo_2 {
    width: 200px;
    height: 150px;
    border-radius: 0px;
  }

  #rsd_photo {
    position: absolute;
    top: 100%;
    left: 28%;


    width: 250px;
    height: 250px;
    border-radius: 0px;
    border: 2px solid black;
  }

  #header_text_1 {
    font-family: Serif;
  }

  #header_text_2 {
    font-family: Serif;
    text-decoration: none;
    font-style: italic;
  }

  #body_title_1 {
    font-family: Serif;
    text-decoration: none;
    font-style: normal;
    padding-top: 30px;
    padding-bottom: 30px;
  }

  #body_text_1 {
    font-family: Serif;
    font-size: 30px;
    line-height: 60px;

    padding-top: 30px;
    padding-bottom: 30px;
  }

  #body_text_2 {
    font-family: Sans-Serif;
    font-size: 20px;
    text-align: center;
  }

  #body_text_3 {
    font-family: Serif;
    font-size: 25px;
    text-align: right;
    padding-bottom: 10px;
  }

  #body_text_4 {
    font-family: Serif;
    font-size: 25px;
    text-align: center;
    padding-bottom: 10px;
  }

  #body_sign_1 {
    font-family: Serif;
    font-size: 30px;
    text-decoration: underline;
    font-weight: bold;

    padding-top: 20px;
    padding-bottom: 10px;
    padding-right: 20px;
  }

  #body_sign_2 {
    font-family: Serif;
    font-size: 30px;

    padding-bottom: 10px;
    padding-right: 50px;
  }

  #body_sign_3 {
    font-family: Serif;
    font-size: 30px;

    padding-bottom: 50px;
    padding-right: 10px;
  }

  @media print {
    #main_page {
      padding: none;
    }

    /* body {
      background-image: url('../../images/cert-bg.jpg');
      background-size: cover;
      background-repeat: no-repeat;
      background-position: center;

    } */

    #header_logo {
      width: 120px;
      height: 120px;
      margin-bottom: 10px;
    }

    #rsd_photo {
      position: absolute;
      top: 46%;
      left: 30%;

      width: 200px;
      height: 200px;
      border-radius: 0px;
      border: 2px solid black;
    }

    #body_title_1 {
      padding-top: 30px;
      padding-bottom: 10px;
    }

    #header_text_1 {
      font-size: 23px;
    }

    #header_text_2 {
      font-size: 18px;
    }

    #body_text_1 {
      font-size: 20px;
      line-height: 25px;

      padding-top: 0px;
      padding-bottom: 5px;
    }

    #body_text_2 {
      font-size: 16px;
    }

    #body_text_3 {
      font-size: 23px;
    }

    #body_text_4 {
      font-size: 20px;
    }


    #body_sign_1 {
      font-size: 23px;
      padding-top: 10px;
      padding-right: 20px;
    }

    #body_sign_2 {
      font-size: 23px;
      padding-right: 50px;

      padding-top: 0px;
      padding-bottom: 0px;
    }

    #body_sign_3 {
      font-size: 23px;
      padding-right: 15px;
    }

    #print_btn {
      display: none;
    }

    #back_btn {
      display: none;
    }
  }
</style>

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="initial-scale=1.0">

  <title>Mama-maya | Barangay Clearance</title>
  <!-- base:css -->
  <?= $FormPlugins ?>
  <link rel="stylesheet" href="../../css/cert_print_style.css" media="print">
</head>

<body>
  <div id="main_page" class="container-scroller d-flex p-4">
   <div style="margin-top: 5%;">
    <table class="table">
      <?php
      $Resident = $_GET['resident'];
      // $Purpose = $_GET['purpose'];
      // $Cert_num = $_GET['cert_num'];
      $Cert_num = 'SAMPLE';

      $ResidentProfile = mysqli_query($conn, "SELECT * FROM `vw_resident` WHERE `Resident ID` = '$Resident'");
      while ($row = $ResidentProfile->fetch_assoc()) {
        $Name = $row['Name_2'];
        $Age = $row['Age'];
        $Gender = $row['Gender'];
        $CivilStatus = $row['Civil Status'];
        $Address = $row['Address'];
        $Photo = $row['Photo'];
        $Title = '';

        if ($Gender == 'Male') {
          $Title = 'Mr.';
        } else if ($Gender == 'Female' &&  $CivilStatus == 'Single' || $CivilStatus == 'Divorced') {
          $Title = 'Ms.';
        } else if ($Gender == 'Female') {
          $Title = 'Mrs.';
        } else {
          $Title = 'Error';
        }

        $OfficialProfile = mysqli_query($conn, "SELECT * FROM `vw_official` WHERE `Position` = 'Punong Barangay'");
        while ($ofclRow = $OfficialProfile->fetch_assoc()) {
          $OfclName = $ofclRow['Name'];
          $OfclPosition = $ofclRow['Position'];
      ?>
          <tr>
            <td width="24%" class="border-bottom border-dark">
              <div class="brand-logo d-flex justify-content-start">
                <img id="header_logo" src="../../images/logo_v2.png" alt="logo">
              </div>
            </td>

            <td width="52%" class="text-center">
              <h1 id="header_text_1">REPUBLIC OF THE PHILIPPINES <br>CAVITE CITY </h3>
                <h2 id="header_text_2">BARANGAY No. 31 MAYA - MAYA</h3>
                  <h1 id="header_text_1">OFFICE OF THE BARANGAY CHAIRMAN</h3>
            </td>
            <td width="24%">
              <div class="brand-logo d-flex justify-content-end">
                <img id="header_logo" src="../../images/cavitelogo.png" alt="logo">
              </div>
            </td>

          </tr>

          <tr>
            <td rowspan="7" class="border border-dark" style="vertical-align: top;">
              <!-- <div class="d-flex justify-content-center">
                <img id="header_logo_2" src="../../images/brgy_cert_logo.png" alt="logo">
              </div> -->

              <br><br>
              <p id="body_text_4">
                <b>BARANGAY OFFICIALS</b>
              </p>

              <br>
              <p id="body_text_2">
                <b>IVY ROSE T. CURAMBAO</b>
              </p>
              <p id="body_text_2">
                Barangay Chairman
              </p>

              <br><br><br>
              <p id="body_text_2">
                <b>MISHELLE C. MEJILLA</b>
              </p>
              <p id="body_text_2">
                Barangay Kagawad
              </p>

              <br><br><br>
              <p id="body_text_2">
                <b>EDILBERTO C. TORIBIO</b>
              </p>
              <p id="body_text_2">
                Barangay Kagawad
              </p>

              <br><br><br>
              <p id="body_text_2">
                <b>JOSELITO A. GONZALES</b>
              </p>
              <p id="body_text_2">
                Barangay Kagawad
              </p>

              <br><br><br>
              <p id="body_text_2">
                <b>FERNANDO C. SIMPELO</b>
              </p>
              <p id="body_text_2">
                Barangay Kagawad
              </p>

              <br><br><br>
              <p id="body_text_2">
                <b>RYAN SANTIAGO</b>
              </p>
              <p id="body_text_2">
                Barangay Kagawad
              </p>

              <br><br><br>
              <p id="body_text_2">
                <b>ALYSSA MARIE G. SANTIAGO</b>
              </p>
              <p id="body_text_2">
                SK Chairperson
              </p>

              <br><br><br>
              <p id="body_text_2">
                <b>MYRNA Z. GIRON</b>
              </p>
              <p id="body_text_2">
                Barangay Secretary
              </p>

              <br><br><br>
              <p id="body_text_2">
                <b>ROBERTO C. JUMAQUIO</b>
              </p>
              <p id="body_text_2">
                Barangay Treasurer
              </p>

              <br><br><br>
              <p id="body_text_2">
                <b>RENATO BUENAVENTURA</b>
              </p>
              <p id="body_text_2">
                Barangay Chief Tanod
              </p>
            </td>
            <td colspan="3" class="text-center border-top border-right border-dark">
              <h2 id="body_title_1">B A R A N G A Y &nbsp&nbsp C L E A R A N C E</h2>
            </td>
          </tr>

          <tr>
            <td colspan="3" class="text-justify border-right border-dark">
              <p id="body_text_3">
                <?= $CurrentDate ?>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
              </p>
              <p id="body_text_3">
                <b>Date</b>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
              </p>

              <p id="body_text_1">
                <b>TO WHOM IT MAY CONCERN:</b>
              </p>

              <p id="body_text_1">
                &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp This is to certify that <?= $Title ?> <?= strtoupper($Name) ?>, legal of age <?= $Age ?>, <?= $CivilStatus ?>. a residence of <?= $Address ?>, Cavite City,
                is a duly registered member of this Barangay.
                <br><br>

                &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp This person is known to me to be a law-abiding citizen with good
                moral character and no derogatory record on out file.
                <br><br>

                &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp This clearance is being issued upon request of the applicant namely:
                <b><?= $Title ?> <?= $Name ?></b> in whatever purpose it may serve.
                <br><br>

                &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp This certification is valid only for 45 (Forty Five ) days from the
                <br> &nbsp&nbsp&nbsp&nbsp date of issue.
                <br><br>

                &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Issued this <?= $CurrentDate2 ?>.
                <br> &nbsp&nbsp&nbsp&nbsp Barangay No. 31 Maya-Maya, Zone IV, Cavite CITY
              </p>

            </td>
          </tr>

      <?php }
      } ?>


      <tr>
        <td class="text-right p-0 border-right border-dark" colspan="2">
          <img id="rsd_photo" src="../../images/residents/<?= $Gender ?>.png" alt="resident photo" style="margin-left: -10px; margin-top:16%; width:15%; height:10%;  position:fixed;">
       
          <p id="body_sign_1">
            <?= strtoupper($OfclName) ?>
          </p>
          <p id="body_sign_2">
            <?= $OfclPosition ?>
          </p>
          <p id="body_sign_3">
            Barangay 31 / Cavite City
          </p>
        </td>
      </tr>

      <tr>
        <td colspan="2" class="text-left border-right border-dark">
          <p id="body_sign_2">
            <b><u>&nbsp&nbsp<?= strtoupper($Name) ?>&nbsp&nbsp</u></b>
          </p>
          <p id="body_sign_2">
            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Applicant
          </p>
        </td>
      </tr>

      <!-- <tr>
      <td colspan="2" class="text-left border-right border-bottom border-dark">
        <br><br><br>
        <p id="body_sign_2">
          Res. Certificate No. &nbsp&nbsp&nbsp : &nbsp&nbsp&nbsp <u>&nbsp&nbsp&nbsp<?= $Cert_num ?>&nbsp&nbsp&nbsp</u> 
          <br><br>

          Date Issued &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp : &nbsp&nbsp&nbsp <u>&nbsp&nbsp&nbsp<?= $CurrentDate ?>&nbsp&nbsp&nbsp</u>
          <br><br>

          Issued At &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp : &nbsp&nbsp&nbsp 
          <u>&nbsp&nbsp Barangay No. 31 - Maya-Maya, Cavite City</u>
        </p>
      </td>
    </tr> -->

      <tr>
        <td colspan="2" class="text-left border-right border-bottom border-dark">
          <br><br><br>
          <p id="body_sign_2">
            Res. Certificate No. &nbsp&nbsp&nbsp : &nbsp&nbsp&nbsp ___________________________
            <br><br>

            Date Issued &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp : &nbsp&nbsp&nbsp ___________________________
            <br><br>

            Issued At &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp : &nbsp&nbsp&nbsp ___________________________

          </p>
        </td>
      </tr>
    </table>
   </div>
    

    <div style="width:100%; height:100%; position: fixed; left: 0px; top:0px;">
      <img id="bg_logo" src="../../images/certificate-bg.jpg" alt="logo" style="width:100%; height:100%; opacity:0.2; mix-blend-mode: multiply; ">
    </div>
    
    <button id="print_btn" type="button" onclick="window.print()" class="btn btn-info btn-icon-text">
      <i class="mdi mdi-printer btn-icon-append"></i>
      Print
    </button>

    <a id="back_btn" type="button" href="<?= $Admin_Clearance_list ?>" class="btn btn-warning btn-icon-text">
      <i class="mdi mdi-keyboard-backspace btn-icon-append"></i>
      Back
    </a>
  </div>


  <!-- container-scroller -->
  <!-- base:js -->
  <script src="../../vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="../../js/off-canvas.js"></script>
  <script src="../../js/hoverable-collapse.js"></script>
  <script src="../../js/template.js"></script>
  <!-- endinject -->
</body>

</html>