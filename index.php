<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Php Todo List Json</title>
  <!-- bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <!-- axios -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.27.2/axios.min.js" integrity="sha512-odNmoc1XJy5x1TMVMdC7EMs3IVdItLPlCeL5vSUPN2llYKMJ2eByTTAIiiuqLg+GdNr9hF6z81p27DArRFKT7A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <!-- vue 3 -->
  <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
  <!-- my css -->
  <link rel="stylesheet" href="css/style.css">

</head>

<body>
  <div id="app">
    <div class="container">
      <header>
        <h1>{{title.toUpperCase()}}</h1>
      </header>
      <main>
        <ul class="__to-do-container mb-3">
          <li v-for='(item,index) in todos' :key="index" class="">
            <span class="me-2">{{ index+1 }}.</span>
            <span :class="item.done ? '__done' : ''" @click="toggleDone(index)">{{ item.text }}</span>
          </li>
        </ul>
        <div class=" __my-form mb-4">
          <div action="" class="">
            <div class="mb-3 d-flex">
              <div class="me-3">
                <label for="inputText" class="form-label">{{label}}</label>
                <input v-model="newTodo" type="text" class="form-control w-100" id="inputText" placeholder="Write here a task" @keyup.enter="addTodo()">
              </div>
              <div class="__my-button d-flex align-items-end">

                <button type="submit" class="btn btn-primary" @click="addTodo()">Add Task</button>
              </div>
            </div>



          </div>

        </div>
      </main>
      <footer></footer>


    </div>
  </div>

  <!-- bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  <!-- my script -->
  <script src="./js/script.js"></script>
</body>

</html>