// var map = L.map("map").setView([14.477544186015541, 120.89078101951388], 18);
var map = L.map("map", {
  dragging: true, // Disable dragging
  scrollWheelZoom: false, // Disable zooming with the scroll wheel
}).setView([14.477544186015541, 120.89078101951388], 18);
var selectedMarker = null;
// Add OpenStreetMap tiles as the base layer
L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
  attribution: "© OpenStreetMap contributors",
}).addTo(map);

// Function to display coordinates on click
function onMapClick(e) {
  var marker = L.marker([e.latlng.lat, e.latlng.lng]).addTo(map);

  marker.on("click", async function () {
    $(".box-residents").removeClass("d-none");
    $(".btnSaveCoordinates").addClass("d-none");
    $(".btnAddResidents").addClass("d-none");
    $(".residents").empty();
    $(".address").text("Loading...");
    var location = await $.ajax({
      url:
        "https://nominatim.openstreetmap.org/reverse?format=jsonv2&lat=" +
        e.latlng.lat +
        "&lon=" +
        e.latlng.lng,
      type: "GET",
      success: function (response) {
        return response;
      },
    });

    console.log(location);

    selectedMarker = location;

    const { osm_id, display_name } = location;

    $(".address").text(display_name);

    $.ajax({
      url: "./server/load.residents.php",
      type: "POST",
      data: location,
      success: function (data) {
        // console.log(data);

        var response = data;
        var responseJson = JSON.parse(response);

        if (responseJson.success === false) {
          $(".btnSaveCoordinates").removeClass("d-none");
        }
        $(".btnAddResidents").removeClass("d-none");
        $(".btnAddResidents").attr("data-id", osm_id);
        console.log(responseJson.extra);
        var residents = responseJson.extra;
        if (responseJson.extra == undefined) {
          $(".residents").append(
            `<div class="mb-2">
                            <p>No residents found</p>
                        </div>`
          );
        }
        residents.forEach((resident) => {
          $(".residents").append(
            `<div class="mb-2">
            <p><b>Head of Family Name:</b> <span style="font-size: 18px;">${resident.head_of_family_name}</span></p>
            <p><b>Member Names:</b> <span style="font-size: 18px;">${resident.member_names}</span></p>
            <p><b>Number of Members:</b> <span style="font-size: 18px;">${resident.num_members}</span></p>
            <p><b>Male Count:</b> <span style="font-size: 18px;">${resident.male_count}</span></p>
            <p><b>Female Count:</b> <span style="font-size: 18px;">${resident.female_count}</span></p>
            <p><b>Senior Count:</b> <span style="font-size: 18px;">${resident.senior_count}</span></p>
            <p><b>PWD Count:</b> <span style="font-size: 18px;">${resident.pwd_count}</span></p>
        </div>`
          );
        });

        // residents.forEach((resident) => {
        //   $(".residents").append(
        //     `<div class="mb-2">
        //                     <p>${resident.f_name} ${resident.m_name} ${resident.l_name} ${resident.ext_name}</p>
        //                     <ul>
        //                         <li>
        //                             <b>Birthdate: </b> ${resident.birthdate}
        //                         </li>
        //                         <li>
        //                             <b>Gender:</b> ${resident.gender}
        //                         </li>
        //                         <li>
        //                             <b>Voter Status:</b> ${resident.voter_status}
        //                         </li>
        //                     </ul>
        //                     <button class="btn btn-danger" onclick="deleteResident('${resident.rsdt_id}')">
        //                         Delete
        //                     </button>
        //                 </div>`
        //   );
        // });
      },
      error: function (xhr, status, error) {
        console.error("AJAX request failed:", error);
      },
    });
  });
}

// function onMapClick(e) {
//   var marker = L.marker([e.latlng.lat, e.latlng.lng]).addTo(map);

//   marker.on("click", async function () {
//     var boxResidents = document.querySelector(".box-residents");
//     var btnSaveCoordinates = document.querySelector(".btnSaveCoordinates");
//     var btnAddResidents = document.querySelector(".btnAddResidents");
//     var residentsContainer = document.querySelector(".residents");
//     var addressElement = document.querySelector(".address");

//     boxResidents.classList.remove("d-none");
//     btnSaveCoordinates.classList.add("d-none");
//     btnAddResidents.classList.add("d-none");
//     residentsContainer.innerHTML = "";
//     addressElement.textContent = "Loading...";

//     var xhr = new XMLHttpRequest();
//     xhr.open("POST", "./server/load.residents.php", true);
//     xhr.setRequestHeader("Content-Type", "application/json");

//     xhr.onload = function () {
//       if (xhr.status === 200) {
//         var responseJson = JSON.parse(xhr.responseText);

//         if (responseJson.success === false) {
//           btnSaveCoordinates.classList.remove("d-none");
//         }
//         btnAddResidents.classList.remove("d-none");
//         var residents = JSON.parse(responseJson.extra);

//         if (residents.length === 0) {
//           residentsContainer.innerHTML = `<div class="mb-2">
//                             <p>No residents found</p>
//                         </div>`;
//         } else {
//           addressElement.textContent = residents[0].address;

//           residents.forEach(function (resident) {
//             residentsContainer.innerHTML += `<div class="mb-2">
//                                 <p>${resident.head_of_family_name}</p>
//                                 <ul>
//                                     <li>
//                                         <b>Number of Members: </b> ${resident.num_members}
//                                     </li>
//                                     <li>
//                                         <b>Male Count:</b> ${resident.male_count}
//                                     </li>
//                                     <li>
//                                         <b>Female Count:</b> ${resident.female_count}
//                                     </li>
//                                     <li>
//                                         <b>Senior Count:</b> ${resident.senior_count}
//                                     </li>
//                                     <li>
//                                         <b>PWD Count:</b> ${resident.pwd_count}
//                                     </li>
//                                 </ul>
//                             </div>`;
//           });
//         }
//       } else {
//         console.error("Error:", xhr.statusText);
//       }
//     };

//     xhr.onerror = function () {
//       console.error("Request failed");
//     };

//     var requestData = {
//       latitude: e.latlng.lat,
//       longitude: e.latlng.lng,
//     };

//     xhr.send(JSON.stringify(requestData));
//   });
// }

// Attach click event listener to the map
map.on("click", onMapClick);

$(".btnSaveCoordinates").on("click", (e) => {
  $.ajax({
    url: "./server/save.house.php",
    type: "POST",
    data: selectedMarker,
    success: function (data) {
      var response = data;
      var responseJson = JSON.parse(response);
      if (responseJson.success === true) {
        $(".btnSaveCoordinates").addClass("d-none");
        Swal.fire({
          position: "top",
          icon: "success",
          title: "Coordinates Saved",
          text: responseJson.message,
          showConfirmButton: false,
          timer: 1000,
        });
      } else {
        Swal.fire({
          position: "top",
          icon: "error",
          title: "Failed to Save",
          text: responseJson.message,
          showConfirmButton: false,
          timer: 1000,
        });
      }
    },
  });
});

$("#AddResidents").on("show.bs.modal", (event) => {
  const button = event.relatedTarget;
  const recipient = button.getAttribute("data-id");

  $(".CoordinateId").val(recipient);
});

$(".FrmAddResident").on("submit", (e) => {
  e.preventDefault();
  $.ajax({
    url: "./server/add.resident.php",
    type: "POST",
    data: $(".FrmAddResident").serialize(),
    success: function (data) {
      var response = data;
      var responseJson = JSON.parse(response);
      if (responseJson.success === true) {
        Swal.fire({
          position: "top",
          icon: "success",
          title: "Resident Added",
          text: responseJson.message,
          showConfirmButton: false,
          timer: 1000,
        });
        setTimeout(location.reload(), 1500);
      } else {
        Swal.fire({
          position: "top",
          icon: "error",
          title: "Failed to Add",
          text: responseJson.message,
          showConfirmButton: false,
          timer: 1000,
        });
      }
    },
  });
});

function deleteResident(id) {
  Swal.fire({
    title: "Do you want to remove this resident?",
    showDenyButton: true,
    showCancelButton: true,
    showConfirmButton: false,
    denyButtonText: `Yes`,
  }).then((result) => {
    /* Read more about isConfirmed, isDenied below */
    if (result.isDenied) {
      $.ajax({
        url: "./server/delete.resident.php",
        type: "POST",
        data: { id: id },
        success: function (data) {
          var response = data;
          var responseJson = JSON.parse(response);
          if (responseJson.success === true) {
            Swal.fire({
              position: "top",
              icon: "success",
              title: "Resident Deleted",
              text: responseJson.message,
              showConfirmButton: false,
              timer: 1000,
            });
            setTimeout(location.reload(), 1500);
          } else {
            Swal.fire({
              position: "top",
              icon: "error",
              title: "Failed to Delete",
              text: responseJson.message,
              showConfirmButton: false,
              timer: 1000,
            });
          }
        },
      });
    }
  });
}
