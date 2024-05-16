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
    top: 20%;
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

  #name_text_1 {
    font-family: Serif;
    text-align: center;
    font-size: 35px;
  }

  #header_logo {
    width: 100px;
    height: 100px;
  }

  #header_text_1 {
    font-family: Serif;
    text-align: center;
  }

  #header_text_2 {
    font-family: Serif;
    text-decoration: none;
  }

  #body_title_1 {
    font-family: Serif;
    text-decoration: none;
    font-style: none;

    padding: 0px;
  }

  #body_text_1 {
    font-family: Serif;
    font-size: 25px;
    line-height: 30px;
    text-align: center;

    padding: 0px;
  }

  #body_text_2 {
    font-family: Sans-Serif;
    font-size: 20px;
    line-height: 60px;
    text-align: left;

    padding: 0px;
  }

  #body_sign_1 {
    font-family: Serif;
    font-size: 30px;
    text-align: right;
    text-decoration: underline;
    font-weight: bold;

    padding: 0px;
  }

  #body_sign_2 {
    font-family: Serif;
    font-size: 30px;
    text-align: right;

    padding: 0px;
  }

  @media print {
    #main_page {
      padding: none;
    }


    #header_logo {
      width: 100px;
      height: 100px;
    }

    #header_text_1 {
      font-size: 20px;
    }

    #header_text_2 {
      font-size: 15px;
    }

    #body_text_1 {
      font-size: 25px;
      line-height: 30px;
    }

    #body_sign_1 {
      font-size: 25px;
    }

    #body_sign_2 {
      font-size: 25px;
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

  <title>Mama-maya | Business Permit</title>
  <!-- base:css -->
  <?= $FormPlugins ?>
  <link rel="stylesheet" href="../../css/cert_print_style.css" media="print">
</head>

<body>
  <div id="main_page" class="container-scroller d-flex p-4">
    <table class="table table-borderless">
      <?php
      $Resident = $_GET['resident'];

      $Business = $_GET['business'];
      $Location = $_GET['location'];
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
              <div class="brand-logo d-flex justify-content-start">
                <img id="header_logo" src="../../images/cavitelogo.png" alt="logo">
              </div>
            </td>
            <td width="60%" class="text-center">
              <h1 id="header_text_1">REPUBLIC OF THE PHILIPPINES <br> <i> CITY OF CAVITE <br> Barangay No. 31 - Maya-Maya</i></h3>
                <h2 id="header_text_2">OFFICE OF THE BARANGAY CHAIRMAN</h3>
            </td>
            <td width="20%">
              <div class="brand-logo d-flex justify-content-end">
                <img id="header_logo" src="../../images/logo_v2.png" alt="logo">
              </div>
            </td>
          </tr>

          <tr>
            <td colspan="3" class="text-center p-0">
              <br>
              <h2 id="body_title_1">BARANGAY CLEARANCE FOR BUSINESS PERMIT</h2>
            </td>
          </tr>

          <tr>
            <td colspan="3" class="text-justify">
              <p id="body_text_2">
                <b>To Whom It May Concern:</b>
              </p>

              <p id="body_text_1">
                <b>This is to certify that the business or trade activity described below:</b>
              </p>
              <br><br><br>

              <h1 id="name_text_1">
                <?= strtoupper($Business) ?>
              </h1>
              <p id="body_text_1">
                (Business Name or Trade Activity)
              </p>
              <br><br><br>

              <p id="body_text_1">
                <?= $Location ?> <br>
                (Location)
              </p>
              <br><br><br>

              <h1 id="name_text_1">
                <?= strtoupper($Name) ?>
              </h1>
              <p id="body_text_1">
                (Operator)
              </p>
              <br><br><br>

              <p id="body_text_1">
                <?= $Address ?> <br>
                (Address)
              </p>
              <br><br><br>

              <p id="body_text_1">
                Being applied for a corresponding Mayor's permit has been found to be: <br><br>

                ____/ Among those being banned to be established in the barangay under <br>
                Barangay Ordinace No. _____ enacted on__________, 20___ <br><br>

                ____/ Being opposed by the people of this barangay as express under Barangay <br>
                Resolution No. _______ dated ____________,20__<br><br>

                In view of the foregoing, this barangay, thru the undersigned, strongly interposing no <br><br>
                Objection for the issuance of the corresponding Mayor's Permit being applied for. <br>
                (Attached are copies of the aforementioned Ordinance/Resolution) <br>

              </p>

              <p id="body_text_1">
                Issued this <?= $CurrentDate2 ?>
              </p>
            </td>
          </tr>

          <tr>
            <td colspan="3s" class="text-center">
              <br><br><br><br><br><br>
              <p id="body_sign_1">
                <?= strtoupper($OfclName) ?>
              </p>
              <p id="body_sign_2">
                <?= $OfclPosition ?>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
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

    <a id="back_btn" type="button" href="<?= $Admin_Bus_Permit_list ?>" class="btn btn-warning btn-icon-text">
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