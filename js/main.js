document.addEventListener("DOMContentLoaded", function() {

    let categories = document.querySelectorAll('.category');
    categories.forEach(category => {
        category.addEventListener('click',()=>{
            categories.forEach(btn => {
                btn.classList.remove('chosen-category');
            });
            category.classList.add('chosen-category')
        })
    });


    
const titleOptions = document.querySelectorAll('.title-option');

titleOptions.forEach(title => {
  title.addEventListener('click', () => {
    // Remove the 'selected' class from all titles
    titleOptions.forEach(title => {
      title.classList.remove('selected');
    });

    // Add the 'selected' class only to the clicked title
    title.classList.add('selected');
  });
});
  });
  



const activate = (id)=>{
    if(id!="income"){
        document.getElementById("income-btn").setAttribute('class','')
        document.getElementById("income-category").style.display="none" 

    }else{
        document.getElementById("expense-btn").setAttribute('class','') 
        document.getElementById("expense-category").style.display="none"
    }
    document.getElementById(id+"-btn").setAttribute('class','active-'+id+'-btn')
    document.getElementById(id+"-category").style.display="flex"
}


const hide = (id)=>{
    document.getElementById(id).style.display="none"
}

const Show = (id)=>{
    document.getElementById(id).style.display="block"
}


const updateValue = (type)=>{
    let prevAmount =parseInt(document.getElementById("amount").value); 
    if(type=="increment"){
        document.getElementById("amount").value= prevAmount + 1;
    }else{
        document.getElementById("amount").value = prevAmount-1;
    }
}


const swap = (id1, id2)=>{
    hide(id1);
    Show(id2);
}


const changetitle = (id)=>{
    
    document.getElementById(id).textContent = document.getElementById('input-title').value
}

const colorPicker = document.getElementById('color-picker');
const targetElement = document.querySelector('.chosen-category-logo');
colorPicker.addEventListener('input', (event) => {
  const selectedColor = event.target.value;
  targetElement.style.backgroundColor = selectedColor;
});


/*=================statistics.html=======================*/

