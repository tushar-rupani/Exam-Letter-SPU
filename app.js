const checkbox = document.getElementById("checkbox");
const ex = document.getElementById("external");
const info = document.getElementById("info");
const sem = document.getElementById("sem");
var select = document.getElementById("mySelect");
var ref = document.getElementById("reference");
const MCA_SUBJECTS_1 = [
  "PSO3CMCA21 - Python",
  "PS03CMCA23 - Java"
];
const MCA_SUBJECTS_2 = [
  "PSO3CMCA21 - OS",
  "PS03CMCA23 - HY"
];
const MCA_SUBJECTS_3 = [
  "PSO3CMCA21 - HY",
  "PS03CMCA23 - Java"
];
const MCA_SUBJECTS_4 = [
  "PSO3CMCA21 - YUUU",
  "PS03CMCA23 - YUBGFG"
];


const MSC_SUBJECTS_1 = [
  "PSO3CMSC21 - Python",
  "PS03CMSC23 - Java"
];
const MSC_SUBJECTS_2 = [
  "PSO3CMSC21 - OS",
  "PS03CMSC23 - HY"
];
const MSC_SUBJECTS_3 = [
  "PSO3CMSC21 - HY",
  "PS03CMSC23 - Java"
];
const MSC_SUBJECTS_4 = [
  "PSO3CMSC21 - YUUU",
  "PS03CMSC23 - YUBGFG"
];

const PGDCA_SUBJECTS_1 = [
  "PSO3CPGDCA21 - Python",
  "PS03CPGDCA23 - Java"
];
const PGDCA_SUBJECTS_2 = [
  "PSO3CPGDCA21 - OS",
  "PS03CPGDCA23 - HY"
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
    sem.innerHTML = `<label>Select Semester:</label><br><br>
    <select onchange="updateSem(this.value)" name="sem" >
    <option value="" disabled selected>Select Semester</option>
        <option value="1">Sem - 1</option>
        <option value="2">Sem - 2</option>
        <option value="3">Sem - 3</option>
        <option value="4">Sem - 4</option>
    </select>`;
  } else if (currentCourse === "MSC") {
    sem.innerHTML = `<label>Select Semester:</label><br><br>
    <select onchange="updateSem(this.value)" name="sem">
    <option value="" disabled selected>Select Semester</option>
        <option value="1">Sem - 1</option>
        <option value="2">Sem - 2</option>
        <option value="3">Sem - 3</option>
        <option value="4">Sem - 4</option>
    </select>`;
  } else if (currentCourse === "PGDCA") {
    sem.innerHTML = `<label>Select Semester:</label><br><br>
    <select onchange="updateSem(this.value)"  name="sem">
    <option value="" disabled selected>Select Semester</option>
        <option value="1">Sem - 1</option>
        <option value="2">Sem - 2</option>
        
    </select>`;
  }
  let nameOfCheck = 0
  // setCurrentSubjects.forEach((element) => {
  //   nameOfCheck += 1;
  //   checkbox.innerHTML += `<input type="checkbox" name='subject${nameOfCheck}' value="${element}" onchange="handleChange(this)"/> ${element} <br>`;
  // });
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
  let nameOfCheck = 0
  if(currentCourse === "MCA" && c === "1"){
    checkbox.innerHTML = ``;
    MCA_SUBJECTS_1.forEach((element) => {
      nameOfCheck += 1;
      checkbox.innerHTML += `<input type="checkbox" name='subject${nameOfCheck}' value="${element}" onchange="handleChange(this)"/> ${element} <br>`;
    });
    nameOfCheck = 0;
  }
  if(currentCourse === "MCA" && c === "2"){
    checkbox.innerHTML = ``;
    MCA_SUBJECTS_2.forEach((element) => {
      nameOfCheck += 1;
      checkbox.innerHTML += `<input type="checkbox" name='subject${nameOfCheck}' value="${element}" onchange="handleChange(this)"/> ${element} <br>`;
    });
    nameOfCheck = 0;
  }

  if(currentCourse === "MCA" && c === "3"){
    checkbox.innerHTML = ``;
    MCA_SUBJECTS_3.forEach((element) => {
      nameOfCheck += 1;
      checkbox.innerHTML += `<input type="checkbox" name='subject${nameOfCheck}' value="${element}" onchange="handleChange(this)"/> ${element} <br>`;
    });
    nameOfCheck = 0;
  }
  if(currentCourse === "MCA" && c === "4"){
    checkbox.innerHTML = ``;
    MCA_SUBJECTS_4.forEach((element) => {
      nameOfCheck += 1;
      checkbox.innerHTML += `<input type="checkbox" name='subject${nameOfCheck}' value="${element}" onchange="handleChange(this)"/> ${element} <br>`;
    });
    nameOfCheck = 0;
  }

  if(currentCourse === "MSC" && c === "1"){
    checkbox.innerHTML = ``;
    MSC_SUBJECTS_1.forEach((element) => {
      nameOfCheck += 1;
      checkbox.innerHTML += `<input type="checkbox" name='subject${nameOfCheck}' value="${element}" onchange="handleChange(this)"/> ${element} <br>`;
    });
    nameOfCheck = 0;
  }
  if(currentCourse === "MSC" && c === "2"){
    checkbox.innerHTML = ``;
    MSC_SUBJECTS_2.forEach((element) => {
      nameOfCheck += 1;
      checkbox.innerHTML += `<input type="checkbox" name='subject${nameOfCheck}' value="${element}" onchange="handleChange(this)"/> ${element} <br>`;
    });
    nameOfCheck = 0;
  }
  if(currentCourse === "MSC" && c === "3"){
    checkbox.innerHTML = ``;
    MSC_SUBJECTS_3.forEach((element) => {
      nameOfCheck += 1;
      checkbox.innerHTML += `<input type="checkbox" name='subject${nameOfCheck}' value="${element}" onchange="handleChange(this)"/> ${element} <br>`;
    });
    nameOfCheck = 0;
  }
  if(currentCourse === "MSC" && c === "4"){
    checkbox.innerHTML = ``;
    MSC_SUBJECTS_4.forEach((element) => {
      nameOfCheck += 1;
      checkbox.innerHTML += `<input type="checkbox" name='subject${nameOfCheck}' value="${element}" onchange="handleChange(this)"/> ${element} <br>`;
    });
    nameOfCheck = 0;
  }

  if(currentCourse === "PGDCA" && c === "1"){
    checkbox.innerHTML = ``;
    PGDCA_SUBJECTS_1.forEach((element) => {
      nameOfCheck += 1;
      checkbox.innerHTML += `<input type="checkbox" name='subject${nameOfCheck}' value="${element}" onchange="handleChange(this)"/> ${element} <br>`;
    });
    nameOfCheck = 0;
  }

  if(currentCourse === "PGDCA" && c === "2"){
    checkbox.innerHTML = ``;
    PGDCA_SUBJECTS_2.forEach((element) => {
      nameOfCheck += 1;
      checkbox.innerHTML += `<input type="checkbox" name='subject${nameOfCheck}' value="${element}" onchange="handleChange(this)"/> ${element} <br>`;
    });
    nameOfCheck = 0;
  }
  

};
const handleExternal = (c) => {
    if(c.checked){
        ex.innerHTML = `<label>Enter External Examiner's Details: Must be separated by (:) colon</label><br><br>
        <p class='example'>Ex: Tushar Rupani, (Ex), SPU, VVN <span>:</span> Ex: Srushtikumari Suthar, (Ex), SPU, VVN</p> <br>
        <textarea name="external" cols=50 rows=4 placeholder="Enter external examiners name, comma separated. Ex: Srushti Suthar,Tushar Rupani"> </textarea>`
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


