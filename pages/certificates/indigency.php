<!DOCTYPE html>
<?php
include '../../php/variables.php';
// include '../../php/login.php';
include '../../php/config.php';
?>
<html lang="en">
<style>
  /* #bg_logo {
    position: absolute;
    width: 100%;
    height: 100%;
    top: 18%;
    left: 50%;
    margin-left: -30%;
    margin-top: -50%;
    transform: rotate(270deg);
    mix-blend-mode: multiply;
    opacity: 0.7;
  } */

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
  }

  #header_text_1 {
    font-family: Serif;
  }

  #header_text_2 {
    font-family: Serif;
    text-decoration: underline;
  }

  #body_title_1 {
    font-family: Serif;
    text-decoration: underline;
    font-style: italic;
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

  #body_sign_1 {
    font-family: Serif;
    font-size: 30px;
    text-decoration: underline;
    font-weight: bold;

    padding-top: 30px;
    padding-bottom: 10px;
    padding-right: 500px;
  }

  #body_sign_2 {
    font-family: Serif;
    font-size: 30px;

    padding-bottom: 30px;
    padding-right: 500px;
  }

  @media print {
    #main_page {
      padding: none;
    }

    body {
      background-image: url('../../images/cert-bg.jpg');
      background-size: cover;
      background-repeat: no-repeat;
      background-position: center;

    }

    #header_logo {
      width: 150px;
      height: 150px;
    }

    #header_text_1 {
      font-size: 30px;
    }

    #header_text_2 {
      font-size: 25px;
    }

    #body_text_1 {
      font-size: 25px;
      line-height: 40px;
    }

    #body_sign_1 {
      font-size: 25px;
      padding-top: 100px;
      padding-right: 300px;
    }

    #body_sign_2 {
      font-size: 25px;
      padding-right: 300px;
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
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Mama-maya | Indigency Certificates</title>
  <!-- base:css -->
  <?= $FormPlugins ?>
  <link rel="stylesheet" href="../../css/cert_print_style.css" media="print">
</head>

<body>
  <div id="main_page" class="container-scroller d-flex p-4">
    <table class="table table-borderless">
      <?php
      $Resident = $_GET['resident'];
      // $Purpose = $_GET['purpose'];
      $ResidentProfile = mysqli_query($conn, "SELECT * FROM `vw_resident` WHERE `Resident ID` = '$Resident'");
      while ($row = $ResidentProfile->fetch_assoc()) {
        $Name = $row['Name_2'];
        $Gender = $row['Gender'];
        $CivilStatus = $row['Civil Status'];
        $Address = $row['Address'];
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
            <td width="20%">
              <div class="brand-logo d-flex justify-content-center">
                <img id="header_logo" src="../../images/cavitelogo.png" alt="logo">
              </div>
            </td>
            <td width="60%" class="text-center">
              <h1 id="header_text_1">REPUBLIC OF THE PHILIPPINES <br> CITY OF CAVITE</h3>
                <h2 id="header_text_2">BARANGAY 31 MAYA - MAYA</h3>
            </td>
            <td width="20%">
              <div class="brand-logo d-flex justify-content-center">
                <img id="header_logo" src="../../images/logo_v2.png" alt="logo">
              </div>
            </td>
          </tr>

          <tr>
            <td colspan="3" class="text-center">
              <h2 id="body_title_1">C E R T I F I C A T E &nbsp&nbsp O F &nbsp&nbsp I N D I G E N C Y</h2>
            </td>
          </tr>

          <tr>
            <td colspan="3" class="text-justify">
              <p id="body_text_1">
                &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp This is to certify that <b> <?= $Title ?> <?= strtoupper($Name) ?> </b> of <?= $Address ?> Cavite City. That this family belong to a less fortunate and has no fixed income.
              </p>

              <p id="body_text_1">
                &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp This certification is issued upon request of
                <?= $Title ?> <?= $Name ?> for whatever legal purpose it may serve him/her.
              </p>

              <p id="body_text_1">
                Purpose: <?= $_GET['purpose']; ?>
              </p>

              <p id="body_text_1">
                Given this <?= $CurrentDate2 ?>
              </p>
            </td>
          </tr>

          <tr>
            <td colspan="2" class="text-center">
              <p id="body_sign_1">
                <?= strtoupper($OfclName) ?>
              </p>
              <p id="body_sign_2">
                <?= $OfclPosition ?>
              </p>

            </td>
          </tr>
      <?php }
      } ?>
    </table>

    <div style="width:100%; height:100%; position: fixed; left: 0px; top:0px;">
      <img id="bg_logo" src="../../images/certificate-bg.jpg" alt="logo" style="width:100%; height:100%; opacity:0.3; mix-blend-mode: multiply; ">
    </div>
    <button id="print_btn" type="button" onclick="window.print()" class="btn btn-info btn-icon-text">
      <i class="mdi mdi-printer btn-icon-append"></i>
      Print
    </button>

    <a id="back_btn" type="button" href="<?= $Admin_Indigency_list ?>" class="btn btn-warning btn-icon-text">
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