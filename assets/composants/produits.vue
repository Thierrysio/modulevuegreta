<template>

    <div class="product-app">
    <ul>
      <li v-for="produit in produits" :key="produit.id">
        <div class="product-item">
          <div class="product-info">
            <strong>{{ produit.nom }}</strong>
            <span>{{ produit.description }}</span>
            <span>{{ produit.prix }}€</span>
          </div>
        </div>
      </li>
    </ul>
    </div>

</template>

<script>
import { ref, onMounted } from 'vue';
name: 'ProduitApp',
setup() {
    const produits = ref([]);

    const getProduits = async () => {
      try {
        const response = await fetch('/api/products/');
        if (!response.ok) {
          throw new Error('Erreur lors du chargement des produits');
        }
        produits.value = await response.json();
      } catch (error) {
        console.error(error);
      }
    };
}



</script>

<style scoped>

.product-app {
  max-width: 600px;
  margin: 0 auto;
}

form {
  display: flex;
  flex-direction: column;
  margin-bottom: 20px;
}

input {
  margin-bottom: 10px;
  padding: 8px;
}

button {
  padding: 10px;
}

ul {
  list-style-type: none;
  padding: 0;
}

li {
  margin-bottom: 10px;
}

.product-item {
  display: flex;
  align-items: center;
  justify-content: space-between;
}

.product-info {
  display: flex;
  flex-direction: column;
}

.product-info strong {
  font-size: 1.1em;
}

.product-info span {
  margin-top: 4px;
}

.product-actions {
  display: flex;
  gap: 10px;
}

.btn-delete {
  background-color: #e74c3c;
  color: #fff;
  border: none;
  padding: 8px 12px;
  cursor: pointer;
  border-radius: 4px;
}

.btn-edit {
  background-color: #3498db;
  color: #fff;
  border: none;
  padding: 8px 12px;
  cursor: pointer;
  border-radius: 4px;
}

.btn-delete:hover {
  background-color: #c0392b;
}

.btn-edit:hover {
  background-color: #2980b9;
}

button[type="submit"] {
  background-color: #2ecc71;
  color: #fff;
  border: none;
  margin-bottom: 10px;
  cursor: pointer;
  border-radius: 4px;
}

button[type="submit"]:hover {
  background-color: #27ae60;
}

button[type="button"] {
  background-color: #95a5a6;
  color: #fff;
  border: none;
  cursor: pointer;
  border-radius: 4px;
}

button[type="button"]:hover {
  background-color: #7f8c8d;
}
</style>