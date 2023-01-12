const checkbox = document.getElementById("checkbox");
const ex = document.getElementById("external");
const info = document.getElementById("info");
const sem = document.getElementById("sem");
var select = document.getElementById("mySelect");
var ref = document.getElementById("reference");
const MCA_SUBJECTS = [
  "PSO3CMCA21 - Python",
  "PS03CMCA23 - Java",
  "PS03CMCA24 - Cloud Computing",
];
const MSC_SUBJECTS = [
  "PSO3CSC21 - ABC",
  "PS03CMSC22 - XYZ",
  "PS03CMCA23 - Cyber Security",
];
const PGDCA_SUBJECTS = [
  "PSO3PGA21 - TYY",
  "PS03PGA22 - AYY",
  "PS03PGA23 - Testing",
];
let currentCourse = "";
let setCurrentSubjects = [];
let selectedSubs = [];

const updateCourse = (e) => {
  checkbox.innerHTML = ``;
  currentCourse = e;
  selectedSubs = [];
  info.innerHTML = ``;
  console.log(currentCourse);
  if (currentCourse === "MCA") {
    setCurrentSubjects = MCA_SUBJECTS;
    sem.innerHTML = `Select Semester: <select onchange="updateSem(this.value)">
    <option value="" disabled selected>Select Semester</option>
        <option value="1">Sem - 1</option>
        <option value="2">Sem - 2</option>
        <option value="3">Sem - 3</option>
        <option value="4">Sem - 4</option>
        </select>`;
  } else if (currentCourse === "MSC") {
    setCurrentSubjects = MSC_SUBJECTS;
    sem.innerHTML = `Select Semester: <select onchange="updateSem(this.value)">
    <option value="" disabled selected>Select Semester</option>
        <option value="1">Sem - 1</option>
        <option value="2">Sem - 2</option>
        <option value="3">Sem - 3</option>
        <option value="4">Sem - 4</option>
        </select>`;
  } else if (currentCourse === "PGDCA") {
    setCurrentSubjects = PGDCA_SUBJECTS;
    sem.innerHTML = `Select Semester: <select onchange="updateSem(this.value)">
    <option value="" disabled selected>Select Semester</option>
        <option value="1">Sem - 1</option>
        <option value="2">Sem - 2</option>
        </select>`;
  }
  let nameOfCheck = 0
  setCurrentSubjects.forEach((element) => {
    nameOfCheck += 1;
    checkbox.innerHTML += `<input type="checkbox" name='subject${nameOfCheck}' value="${element}" onchange="handleChange(this)"/> ${element} <br>`;
  });
  nameOfCheck = 0;
};
const handleChange = (c) => {
  info.innerHTML = ``;
  if (c.checked) {
    selectedSubs.push(c.value);
  } else {
    let index = selectedSubs.indexOf(c.value);
    if (index > -1) {
      selectedSubs.splice(index, 1);
    }
  }
  info.innerHTML = `Selected subjects are <b>${selectedSubs}<b>`;
};
let prefix = "";
let finalString = "";
let increment = Math.floor(Math.random() * Math.pow(10, 2));
const updateSem = (c) => {
  var num = parseInt(c);
  if (num % 2 == 0) prefix = "E";
  else prefix = "O";
  var today = new Date();
  var getYear = today.getFullYear();

  finalString = getYear + prefix + increment;
  console.log(finalString);
  ref.innerHTML = `<input type='hidden' value=${finalString} name='reference' />`;

};
const handleExternal = (c) => {
    if(c.checked){
        ex.innerHTML = `<textarea name="external" cols=50 rows=4 placeholder="Enter external examiners name, comma separated. Ex: Srushti Suthar,Tushar Rupani"></textarea>`
    }
    else{
        ex.innerHTML = ``;
    }
}
const handleExaminer = () => {
  var selectedOptions = select.options;
  var selectedExaminer = [];
  for (var i = 0; i < selectedOptions.length; i++) {
    if (selectedOptions[i].selected) {
      selectedExaminer.push(selectedOptions[i].value);
    }
    console.log(selectedExaminer);
  }
};

let convener = "";
const handleConvener = (a) => {
    convener = a;
}


