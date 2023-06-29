var filterTable = [];
var dataTable = [];
var dataAuthor = [];
var dataTool = [];
let url = '../getTable.php';
let response = fetch(url)
    .then(response => response.json())
    .then((data) => {
        Object.assign(dataTable, data.table)
        Object.assign(filterTable, data.table)
        filterTable.reverse()
        Object.assign(dataAuthor, data.author)
        Object.assign(dataTool, data.tool)
        let el = document.getElementById('tableFilter')
        el.outerHTML = createTable(filterTable)
        setAutorAndTool()
    })

function createTable(filterTable) {
    let addHTML = ''
    for (let itemTable in filterTable) {
        if (filterTable[itemTable].author === undefined) {
            filterTable[itemTable].author = ''
        }
        let item = '<tr class="align-middle tableFilter">' +
            '<td>' + filterTable[itemTable].id + '</td>' +
            '<td class="d-inline-block text-truncate table-test-url">' + filterTable[itemTable].file + '</td>' +
            '<td>' + filterTable[itemTable].title + '</td>' +
            '<td class="table-test-edit"><a type="button" class="btn btn-success btn-sm" href="\edit.html?file=' + filterTable[itemTable].file + '">EDIT</a></td>' +
            '<td>Published</td>' +
            '<td>' + filterTable[itemTable].author + '</td>' +
            '<td>' + filterTable[itemTable].category + '</td>' +
            '<td>' + filterTable[itemTable].tool + '</td>' +
            '<td>' + filterTable[itemTable].views + '</td>' +
            '<td>' + getDateFromString(filterTable[itemTable].published_on) + '</td>' +
            '<td>' + getDateFromString(filterTable[itemTable].modified_on) + '</td>' +
            '<td class="table-test-unpublish">' +
            '<button type="button" class="btn btn-light btn-sm">UNPUBLISH</button>' +
            '</td>' +
            '</tr>'
        addHTML = addHTML + item
    }
    return addHTML
}

function getDateFromString(dateTime) {
    let objectDate =new Date(dateTime);
    let day = objectDate.getDate();
    let month = objectDate.getMonth();
    let year = objectDate.getFullYear();
    if (day < 10) day = '0' + day
    if (month < 10) month = `0${month}`
    return `${day}-${month}-${year}`;
}

function setAutorAndTool() {
    setAutor()
    setTool()
}

function setAutor() {
    let el = document.getElementById('select-author')
    let addHTML = '<li><button class="dropdown-item" onclick="filterAuthor(false)">все</button></li>'
    for (let itemAuthor of dataAuthor) {
        let item = '<li><button class="dropdown-item" onclick="filterAuthor(this.innerText)">' + itemAuthor + '</button></li>'
        addHTML = addHTML + item
    }
    el.outerHTML = addHTML;
}

function setTool() {
    let el = document.getElementById('select-tool')
    let addHTML = '<li><button class="dropdown-item" onclick="filterTool(false)">все</button></li>'
    for (let itemTool of dataTool) {
        let item = '<li><button class="dropdown-item" onclick="filterTool(this.innerText)">' + itemTool + '</button></li>'
        addHTML = addHTML + item
    }
    el.outerHTML = addHTML;
}

function filterTool(tool) {
    if (tool === false) {
        erasingAndDisplayingTable(filterTable)
    } else {
        erasingAndDisplayingTable(searchTool(tool))
    }
}

function searchTool(tool) {
    return filterTable.filter(elem => {
        return elem.tool.includes(tool)
    });
}

function filterAuthor(author) {
    if (author === false) {
        erasingAndDisplayingTable(filterTable)
    } else {
        erasingAndDisplayingTable(searchAuthor(author))
    }
}

function searchAuthor(author) {
    return filterTable.filter(elem => {
        return elem.author.includes(author)
    });
}

function erasingAndDisplayingTable(filterTable) {
    let table = document.querySelectorAll('.tableFilter');
    if (table.length > 1) {
        for (let i = 1; i < table.length; i++) {
            table[i].remove()
        }
    }
    let insertTable = createTable(filterTable);
    if (insertTable === '') {
        insertTable = '<tr class="tableFilter"></tr>'
    }
    table[0].outerHTML = insertTable;
}

function filterContent(search) {
    if (search === '') {
        erasingAndDisplayingTable(filterTable)
    } else {
        erasingAndDisplayingTable(searchContent(search))
    }
}

function searchContent(search) {
    return filterTable.filter(elem => {
        return (elem.file.toLowerCase().includes(search.toLowerCase())
            || (elem.title.toLowerCase().includes(search.toLowerCase())))
    });
}
