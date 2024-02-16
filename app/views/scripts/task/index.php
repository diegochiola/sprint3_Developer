<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TO DO LIST</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        a:hover {
            background-color: #bbbbf5; 
            filter: brightness(90%); 
        }
    </style>
    
</head>
<body style="background-color: #bbbbf5;">

<main class="container mx-auto mt-10 lg:mt-20">
    <div class="w-full max-w-md mx-auto" >
        <div class="bg-white shadow-md rounded-3xl px-6 pt-6 pb-8 mb-4" style="background-color: #141439;">
            <h1 class="text-center text-2xl font-bold mb-8 text-white">WELCOME TO <br> 'TO DO LIST'</h1>
                <div class="mb-6 text-center">
                    <a href="createTask.phtml" class="bg-blue-500 hover:bg-blue-700 text #282854 font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline " style="background-color: #bbbbf5;">Create Task</a>    
                </div>
                <div class="mb-6 text-center">
                    <a href="showTaskList.phtml" class="bg-blue-500 hover:bg-blue-700 text #282854 font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" style="background-color: #bbbbf5;">Show Task List</a>
                </div>
                
       

            <div class="text-gray-400 text-center mt-4 text-xs ">Thank you for using this app created by Gonzalo and Diega.</div>
        </div>
    </div>
</main>

</body>
</html>