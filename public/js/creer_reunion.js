let pluses = document.querySelectorAll(".plus");
let members = document.querySelectorAll(".member");
let selectedNames = [];
let selectedIds = [];
let submitButton = document.querySelector("#submit-create-reunion");
let strSelectedNames = "";

console.log(pluses);

members.forEach((member, index) => {
  member.querySelector(".plus").addEventListener("click", function () {
    console.log(member);
    selectedName = member.firstChild.nodeValue;
    if (!selectedNames.includes(selectedName)) {
      selectedNames.push(selectedName);
    } else {
      selectedNames.splice(selectedNames.indexOf(selectedName), 1);
    }
    // console.log(selectedNames);

    selectedId = member.id;
    if (!selectedIds.includes(selectedId)) {
      selectedIds.push(selectedId);
    } else {
      selectedIds.splice(selectedIds.indexOf(selectedId), 1);
    }
    // console.log(selectedIds);

    strSelectedNames = "";
    selectedNames.forEach((nom, index) => {
      strSelectedNames += nom + ", ";
    })
    document.getElementById("members-list").textContent = strSelectedNames;
  });
});

pluses.forEach((plus, index) => {
  plus.addEventListener("click", function () {
    
  });
});

submitButton.addEventListener("click", function () {
  let jsonMembersList = document.querySelector("#json-members-list");
  jsonMembersList.value = JSON.stringify(selectedIds);
});
