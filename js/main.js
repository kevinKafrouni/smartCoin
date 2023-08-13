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


const editCategory = (categoryName) => {
    // Encode the category name in case it contains special characters
    var encodedCategoryName = encodeURIComponent(categoryName);
    window.location.href = "edit-category.php?category=" + encodedCategoryName;
    Show('popup');
}

const addTransaction = (categoryName) => {
    // Encode the category name in case it contains special characters
    var encodedCategoryName = encodeURIComponent(categoryName);
    window.location.href = "transaction-step2.php?category=" + encodedCategoryName;
    Show('popup');
}


  });
  
/*==========================change category logo======================*/
  function handleImageChange(imageFileName) {
    const selectedImage = document.getElementById('selected-logo');
    selectedImage.src = 'category_options/' + imageFileName;
    document.getElementById('select-logo').value=imageFileName;
}


/*=====================================================================*/
const activate = (id) => {
    const categories = ["income", "expense"];
    categories.forEach(category => {
        const categoryBtn = document.getElementById(category + "-btn");
        const categoryDiv = document.getElementById(category + "-category");
        
        if (category === id) {
            categoryDiv.style.display = "flex";
        } else {
            categoryDiv.style.display = "none";
        }

        categoryBtn.classList.toggle("active-" + category + "-btn", category === id);
    });

    document.getElementById("category-type").value = id;
};




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




function getTodayDateString() {
    const today = new Date();
    const year = today.getFullYear();
    const month = String(today.getMonth() + 1).padStart(2, '0');
    const day = String(today.getDate()).padStart(2, '0');
    return `${year}-${month}-${day}`;
}

// Set the default value of the date input to today's date
const dateInput = document.getElementById('dateInput');
dateInput.value = getTodayDateString();

/*=================statistics.html=======================*/




