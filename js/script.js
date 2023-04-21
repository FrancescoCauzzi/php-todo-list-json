const { createApp } = Vue;

createApp({
  data() {
    return {
      title: "My to-do list",
      label: "Add something to the ToDo-List",
      todos: [],
      newTodo: "",
    };
  },

  methods: {
    async getTodos() {
      try {
        const response = await axios.get("./server.php");

        this.todos = response.data;
        console.log(this.todos);
      } catch (error) {
        console.error(error);
      }
    },
    async addTodo() {
      // this.todos.push(this.newTodo);

      // Canonical way to add a new Todo
      // const formData = new FormData();
      // formData.append("text", this.newTodo);
      // formData.append("done", false);

      let data = {
        newTodo: "",
      };

      data.newTodo = this.newTodo;
      try {
        const response = await axios.post("./server.php", data, {
          headers: { "Content-Type": "multipart/form-data" },
        });
        console.log(response);

        console.log("post call success");
        this.newTodo = "";

        // Reload the todos after successful post request
        this.getTodos();
      } catch (error) {
        console.error(error);
      }
    },
    async updateJSON() {
      // Create a FormData object
      const formData = new FormData();
      formData.append("action", "updateTodos");
      // Forms send only strings data type or numbers data type
      formData.append("newTodos", JSON.stringify(this.todos));

      // Make an AJAX request to update the JSON file on the server
      await axios
        .post("./server.php", formData)
        .then((response) => {
          console.log("Todo updated:", response.data);
        })
        .catch((error) => {
          console.error("Error updating todo:", error);
        });
    },
    toggleDone(index) {
      // Update the done status of the todo item in the local todos array
      this.todos[index].done = !this.todos[index].done;
      this.updateJSON();
    },
    deleteTodo(index) {
      // Update the local todos array by removing the item clicked
      this.todos.splice(index, 1);
      this.updateJSON();
    },
  },
  mounted() {
    this.getTodos();
  },
}).mount("#app");
