let button1 = document.getElementById("button1");
let button2 = document.getElementById("button2");
let button3 = document.getElementById("button3");
let content1 = document.getElementById("content1");
let content2 = document.getElementById("content2");
let content3 = document.getElementById("content3");

button1.addEventListener("click", function () {
    content1.style.display = "block";
    content2.style.display = "none";
    content3.style.display = "none";
});

button2.addEventListener("click", function () {
    content1.style.display = "none";
    content2.style.display = "block";
    content3.style.display = "none";
});

button3.addEventListener("click", function () {
    content1.style.display = "none";
    content2.style.display = "none";
    content3.style.display = "block";
});


button1.addEventListener('click', async (e) => {
    e.preventDefault();
    await showAll();
})


async function showAll() {
    const response = await fetch('showAll.php');
    let htmlCode = await response.text();
    let showAllResultDiv = document.getElementById("showAllResult");
    showAllResultDiv.innerHTML = htmlCode;
    addEditButtonsToForm(document.querySelectorAll('.content1 .form'));
}

class Data {
    id;
    name;
    stock;
}

function addEditButtonsToForm(forms) {
    forms.forEach((form) => {
        let formData = new FormData(form);
        let data = new Data();

        data.id = formData.get('id');
        data.name = formData.get('name');
        data.stock = formData.get('stock');

        for (const input of form.children) {
            input.addEventListener('click', async (e) => {
                e.preventDefault();
                data.edit = input.value;
                const response = await fetch('editAndRemove.php', {
                    method: 'POST',
                    body: JSON.stringify(data)
                });
                let mes = await response.text();
                form.parentNode.innerHTML = mes;
                let resOfEditForm = document.getElementById('resOfEditForm');
                if (resOfEditForm) {
                    resOfEditForm.addEventListener('submit', async (e) => {
                        e.preventDefault();
                        await finishEditing(resOfEditForm, data.id);
                    })
                }
                let backBtn = document.getElementById('backBtn');
                if (backBtn) {
                    backBtn.addEventListener('click', async (e) => {
                        e.preventDefault();
                        await back(data);
                    })
                }
            })
        }
    });
}

async function back(data) {
    let form_data = new FormData();

    for ( let key in data ) {
        form_data.append(key, data[key]);
    }
    await addGood(form_data);
    await showAll();
}


async function finishEditing(form, oldId) {
    let formData = new FormData(form);
    let dataa = {
        id: formData.get('id'),
        name: formData.get('name'),
        stock: formData.get('stock'),
        oldId: oldId
    }
    const response = await fetch('resultEdit.php', {
        method: 'POST',
        body: JSON.stringify(dataa)
    });
    let mes = await response.text();
    console.log(mes)
    await showAll();
}


let addForm = document.getElementById('addForm');

addForm.addEventListener('submit', async (e) => {
    e.preventDefault();
    let formData = new FormData(addForm);
    await addGood(formData);
})


async function addGood(form) {
    let product = {
        id:form.get('id'),
        name: form.get('name'),
        stock: form.get('stock')
    }
    const response = await fetch('add.php', {
        method: 'POST',
        body: JSON.stringify(product)
    });
    mes = await response.text();
    let additionResult = document.getElementById("addResult");
    additionResult.innerHTML = mes
}

let searchForm = document.getElementById('searchForm');
searchForm.addEventListener('submit', async (e) => {
    e.preventDefault();
    await searchByName(searchForm);
})

async function searchByName(form) {
    const search = form.search.value;
    const response = await fetch('search.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: `search=${search}`
    });
    let htmlCode = await response.text();
    let searchResult = document.getElementById("searchResult");
    searchResult.innerHTML = htmlCode;
}

