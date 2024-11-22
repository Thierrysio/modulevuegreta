<template>
    <div class="todo-app">
      <h1>Ma Liste de Tâches</h1>
      <input
        v-model="newTask"
        @keyup.enter="addTask"
        placeholder="Ajouter une nouvelle tâche"
      >
      <button @click="addTask">Ajouter</button>
  
      <ul>
        <li v-for="(task, index) in tasks" :key="index">
          <span :class="{ completed: task.completed }">{{ task.title }}</span>
          <button @click="toggleCompletion(task)">✔️</button>
          <button @click="deleteTask(index)">🗑️</button>
        </li>
      </ul>
    </div>
  </template>
  
  <script>
  import { ref } from 'vue';
  
  export default {
    name: 'TodoApp',
    setup() {
      const newTask = ref('');
      const tasks = ref([]);
  
      const addTask = () => {
        if (newTask.value.trim() !== '') {
          tasks.value.push({ title: newTask.value, completed: false });
          newTask.value = '';
        }
      };
  
      const toggleCompletion = (task) => {
        task.completed = !task.completed;
      };
  
      const deleteTask = (index) => {
        tasks.value.splice(index, 1);
      };
  
      return {
        newTask,
        tasks,
        addTask,
        toggleCompletion,
        deleteTask,
      };
    },
  };
  </script>
  
  <style scoped>
  .todo-app {
    max-width: 500px;
    margin: 0 auto;
    text-align: center;
  }
  input {
    width: 70%;
    padding: 8px;
    margin-right: 5px;
  }
  button {
    padding: 8px 12px;
  }
  ul {
    list-style-type: none;
    padding: 0;
  }
  li {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 5px 0;
  }
  .completed {
    text-decoration: line-through;
    color: gray;
  }
  </style>
  