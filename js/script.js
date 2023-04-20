const { createApp } = Vue;

createApp({
  data() {
    return {
      title: "My to-do list",
      todos: [],
    };
  },

  methods: {
    async getTodos() {
      try {
        const response = await axios.get("./server.php");
        console.log(response.data);
        this.todos = response.data;
        console.log(this.todos);
      } catch (error) {
        console.error(error);
      }
    },
  },

  mounted() {
    this.getTodos();
  },
}).mount("#app");
