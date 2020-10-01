// var click = document.getElementById('link').addEventListener('click', buttonClick);
// var link = document.getElementsByClassName('link');

// function buttonClick(e){
//     fix.style.minHeight = '350px';  
//     link.style.marginTop = '204px';
// }




var fix = document.getElementById('fix');
var button = document.getElementById('btnnn').addEventListener('click', buttonClick);
var content = document.getElementById('content');
var icon = document.getElementById('icon');
var header = document.getElementById('heading');
document.getElementById('content').style.display = "none";
var lecc = document.getElementById('lecturers1');
var count = lecc.childElementCount;
if(count==0){
    var numberOfChildren = '1000';
}
else{
    var numberOfChildren = ((((count/4)-1)*160)+900).toString();
}
var height = numberOfChildren.concat('px');
// console.log(numberOfChildren);
function buttonClick(e){
    e.preventDefault();
    if(fix.style.minHeight != height){
        fix.lastElementChild.style.marginTop = '200px';
        icon.className = 'fas fa-chevron-up fa-2x';
        fix.style.minHeight = height;
        header.style.fontSize = '23px';
        document.getElementById('content').style.display = "";
        // var sheet = document.createElement('h4')
        // sheet.innerHTML = "{border: 2px solid black; background-color: blue;text-align:center;}";
        // sheet.innerText = 'Department Head';
        // content.appendChild(sheet);   
    }
    else{
        document.getElementById('content').style.display = "none";
        fix.lastElementChild.style.marginTop = '0px';
        icon.className = 'fas fa-chevron-down fa-2x';
        fix.style.minHeight = '100px';
        header.style.fontSize = '16px';
    
    }
    
}

var fix2 = document.getElementById('fix2');
var button2 = document.getElementById('btn2').addEventListener('click', buttonClick2);
var content2 = document.getElementById('content2');
var icon2 = document.getElementById('icon2');
var header2 = document.getElementById('heading2');
document.getElementById('content2').style.display = "none";
var lecc = document.getElementById('lecturers2');
var count = lecc.childElementCount;
if(count==0){
    var numberOfChildren = '1000';
}
else{
    var numberOfChildren = ((((count/4)-1)*180)+1100).toString();
}
// console.log(numberOfChildren);
var height2 = numberOfChildren.concat('px');
function buttonClick2(e){
    e.preventDefault();
    if(fix2.style.minHeight != height2){
        fix2.lastElementChild.style.marginTop = '200px';
        icon2.className = 'fas fa-chevron-up fa-2x';
        fix2.style.minHeight = height2;
        header2.style.fontSize = '23px';
        document.getElementById('content2').style.display = "";
        // var sheet = document.createElement('h4')
        // sheet.innerHTML = "{border: 2px solid black; background-color: blue;text-align:center;}";
        // sheet.innerText = 'Department Head';
        // content.appendChild(sheet);   
    }
    else{
        document.getElementById('content2').style.display = "none";
        fix2.lastElementChild.style.marginTop = '0px';
        icon2.className = 'fas fa-chevron-down fa-2x';
        fix2.style.minHeight = '100px';
        header2.style.fontSize = '16px';
    
    }
    
}


var fix3 = document.getElementById('fix3');
var button3 = document.getElementById('btn3').addEventListener('click', buttonClick3);
var content3 = document.getElementById('content3');
var icon3 = document.getElementById('icon3');
var header3 = document.getElementById('heading3');
document.getElementById('content3').style.display = "none";
var lecc = document.getElementById('lecturers3');
var count = lecc.childElementCount;
if(count==0){
    var numberOfChildren = '680';
}
else{
    var numberOfChildren = ((((count/4)-1)*155)+900).toString();
}
// console.log(count);
var height3 = numberOfChildren.concat('px');
function buttonClick3(e){
    e.preventDefault();
    if(fix3.style.minHeight != height3){
        // fix3.lastElementChild.style.marginTop = '200px';
        icon3.className = 'fas fa-chevron-up fa-2x';
        fix3.style.minHeight = height3;
        header3.style.fontSize = '23px';
        document.getElementById('content3').style.display = "";
        // var sheet = document.createElement('h4')
        // sheet.innerHTML = "{border: 2px solid black; background-color: blue;text-align:center;}";
        // sheet.innerText = 'Department Head';
        // content.appendChild(sheet);   
    }
    else{
        document.getElementById('content3').style.display = "none";
        fix3.lastElementChild.style.marginTop = '0px';
        icon3.className = 'fas fa-chevron-down fa-2x';
        fix3.style.minHeight = '100px';
        header3.style.fontSize = '16px';
    
    }
    
}

var fix4 = document.getElementById('fix4');
var button4 = document.getElementById('btn4').addEventListener('click', buttonClick4);
var content4 = document.getElementById('content4');
var icon4 = document.getElementById('icon4');
var header4 = document.getElementById('heading4');
document.getElementById('content4').style.display = "none";
var lecc = document.getElementById('lecturers4');
var count = lecc.childElementCount;
if(count==0){
    var numberOfChildren = '1000';
}
else{
    var numberOfChildren = ((((count/4)-1)*196)+1100).toString();
}
// console.log(numberOfChildren);
var height4 = numberOfChildren.concat('px');
var maxwidth = window.matchMedia("(max-width: 300px)")
function buttonClick4(e){
    e.preventDefault();
    if(fix4.style.minHeight != height4){
        icon4.className = 'fas fa-chevron-up fa-2x';
        fix4.style.minHeight = height4;
        header4.style.fontSize = '23px';
        document.getElementById('content4').style.display = "";
        if (maxwidth.matches) { // media query checking
            fix4.lastElementChild.style.marginTop = '10px';
        } else {
            fix4.lastElementChild.style.marginTop = '200px';
        }
        // var sheet = document.createElement('h4')
        // sheet.innerHTML = "{border: 2px solid black; background-color: blue;text-align:center;}";
        // sheet.innerText = 'Department Head';
        // content.appendChild(sheet);   
    }
    else{
        document.getElementById('content4').style.display = "none";
        fix4.lastElementChild.style.marginTop = '0px';
        icon4.className = 'fas fa-chevron-down fa-2x';
        fix4.style.minHeight = '100px';
        header4.style.fontSize = '16px';
    }
    
}

var fix5 = document.getElementById('fix5');
var button5 = document.getElementById('btn5').addEventListener('click', buttonClick5);
var content5 = document.getElementById('content5');
var icon5 = document.getElementById('icon5');
var header5 = document.getElementById('heading5');
document.getElementById('content5').style.display = "none";
var lecc = document.getElementById('lecturers5');
var count = lecc.childElementCount;
if(count==0){
    var numberOfChildren = '750';
}
else{
    var numberOfChildren = ((((count/4)-1)*190)+1000).toString();
}
// console.log(numberOfChildren);
var height5 = numberOfChildren.concat('px');
function buttonClick5(e){
    e.preventDefault();
    if(fix5.style.minHeight != height5){
        fix5.lastElementChild.style.marginTop = '200px';
        icon5.className = 'fas fa-chevron-up fa-2x';
        fix5.style.minHeight = height5;
        header5.style.fontSize = '23px';
        document.getElementById('content5').style.display = "";
        // var sheet = document.createElement('h4')
        // sheet.innerHTML = "{border: 2px solid black; background-color: blue;text-align:center;}";
        // sheet.innerText = 'Department Head';
        // content.appendChild(sheet);   
    }
    else{
        document.getElementById('content5').style.display = "none";
        fix5.lastElementChild.style.marginTop = '0px';
        icon5.className = 'fas fa-chevron-down fa-2x';
        fix5.style.minHeight = '100px';
        header5.style.fontSize = '16px';
    
    }
    
}



const hamburger = document.querySelector('.header .nav-bar .nav-list .hamburger');
const mobile_menu = document.querySelector('.header .nav-bar .nav-list ul');
const menu_item = document.querySelectorAll('.header .nav-bar .nav-list ul li a');
// const header = document.querySelector('.header.container');
hamburger.addEventListener('click', () => {
    hamburger.classList.toggle('active');
    mobile_menu.classList.toggle('active');
});
