var buttons = document.getElementsByTagName("button");


var tableExists = false;

var rowNum = 0;
function createTable()
{
    if (!tableExists)
    {
    let table = document.createElement('table');
    table.className = "table";
    table.id = "Table1";
    document.body.appendChild(table);
    tableExists = true;
    buttons[1].disabled = false;
    }
    else
    {
        alert("Таблица уже создана");
    }
    
}


function appendRow()
{
    buttons[2].disabled = false;
    rowNum++;
    var table = document.getElementById("Table1");
    
    let row = document.createElement("tr");
    
    let data1 = document.createElement("td");
    data1.className = "Data";
    data1.innerHTML = rowNum;

    let data2 = document.createElement("td");
    data2.className = "Data";
    data2.innerHTML = "LOL " + rowNum;

    let data3 = document.createElement("td");
    data3.className = "Data";
    data3.innerHTML = "KEK " + rowNum;

    table.appendChild(row);
    row.appendChild(data1);
    row.appendChild(data2);
    row.appendChild(data3);
}

function deleteRow()
{
    var input = document.getElementsByTagName("input")[0];
    var val = input.value;
    if (!isNaN(val) && !(val.indexOf(" ") >= 0) && val && val <= rowNum)
    {
        var trs = document.getElementsByTagName("tr");
        for(var i = 0; i < trs.length; i++)
        {
            if(trs[i].firstChild.textContent == val)
            {
                trs[i].remove();
            }
            if(trs[i] != null && trs[i].firstChild.textContent > val)
            {
                trs[i].firstChild.textContent--;
            }
        }
        rowNum--;
    }
    else
    {
        alert("С номером строки что-то не так, перепроверьте");
    }
    
}