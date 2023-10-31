$(document).ready(function() {
    // Load todos from session storage on page load
    loadTodos();

    $(".todoItem").click(function(data){
        console.log(data.currentTarget);
        let tempid=data.currentTarget.id;
        let tempid_new="#"+tempid;
         $("#"+tempid).css("background-color","green");
    
    });
    
    // Event listener for Add button
    $("#addTodoBtn").click(function() {
        addTodo();
    });

    // Event listener for Enter key in input field
    $("#todoInput").keyup(function(event) {
        if (event.key === "Enter") {
            addTodo();
        }
    });
});

function addTodo() {
    const todoText = $("#todoInput").val().trim();

    if (todoText) {
       //console.log( $("<li></li>"));
       let divid=getRandomIdTag();
       
       const li = $("<li id='"+ divid +"'></li>").text(todoText).addClass("todoItem");
        $("#todoList").append(li);

        // Save todo to session storage
        saveTodo(todoText);

        /** Try to get it into a specific function, duplicate code is not a good idea. */
    $(".todoItem").click(function(data){
        console.log(data.currentTarget);
        let tempid=data.currentTarget.id;
        let tempid_new="#"+tempid;
         $("#"+tempid).css("background-color","green");
    
    });
        // Clear input field
        $("#todoInput").val("");
    }
}

function saveTodo(todoText) {
    let todos = JSON.parse(localStorage.getItem("todos") || "[]");
    todos.push(todoText);
    sessionStorage.setItem("todos", JSON.stringify(todos));
}

function loadTodos() {
    const todos = JSON.parse(localStorage.getItem("todos") || "[]");
    todos.forEach(todo => {
       let divid=getRandomIdTag();
        const li = $("<li id='"+ divid +"'></li>").text(todo).addClass("todoItem");
        $("#todoList").append(li);
    });
}


function getRandomIdTag()
{
let random_number=parseInt(Math.random()*1000);
return "mydiv"+random_number;
}