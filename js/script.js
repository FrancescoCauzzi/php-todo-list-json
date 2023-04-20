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
  },

  mounted() {
    this.getTodos();
  },
}).mount("#app");
