<template>
    <div>
        <h2>Items Table</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th @click="sort('name')">
                        Name
                        <span>{{ sortOrder === 'asc' ? '▲' : '▼' }}</span>
                    </th>
                    <th @click="sort('value')">
                        Value
                        <span>{{ sortOrder === 'asc' ? '▲' : '▼' }}</span>
                    </th>
                    <th @click="sort('price')">
                        Price
                        <span>{{ sortOrder === 'asc' ? '▲' : '▼' }}</span>
                    </th>
                    <th @click="sort('email')">
                        Email
                        <span>{{ sortOrder === 'asc' ? '▲' : '▼' }}</span>
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="item in items.data" :key="item.id">
                    <td>{{ item.name }}</td>
                    <td>{{ item.value }}</td>
                    <td>{{ item.price }}</td>
                    <td>{{ item.email }}</td>
                </tr>
            </tbody>
    
        </table>

        <div class="paginator text-center">
          <span>Page {{ pagination.current_page }} of {{ pagination.last_page }}</span>
          <nav>
            <button class="btn btn-dark" @click="previousPage" :disabled="!pagination.prev_page_url">
          Previous
        </button>
            <button class="btn btn-success" @click="nextPage" :disabled="!pagination.next_page_url">
          Next
        </button>
            
        </nav>
        
        </div>
        <button @click="axiosTest">test</button>
    </div>

  
</template>
  
<script setup>
import { ref, onMounted } from 'vue';
import axios from 'axios';






const items = ref([]);
const sortColumn = ref('name'); // Default sorting column
const sortOrder = ref('asc'); // Default sorting order

const pagination = ref({
    current_page: 1,
    last_page: 1,
    next_page_url: null,
    prev_page_url: null,
});

const fetchData = async (page) => {
    if (page < 1 || page > pagination.value.last_page) return;
    try {
        const response = await axios.get(`/api/table-sort?page=${page}`, {
            params: {
                sort_by: sortColumn.value,
                sort_order: sortOrder.value
            }
        });
        items.value = response.data;
        pagination.value = {
            current_page: response.data.current_page,
            last_page: response.data.last_page,
            next_page_url: response.data.next_page_url,
            prev_page_url: response.data.prev_page_url,
        };


    } catch (error) {
        console.error('Error fetching data:', error);
    }
};

const previousPage = () => {
    if (pagination.value.prev_page_url) {
        fetchData(pagination.value.current_page - 1);
    }
};  

// Function to go to the next page
const nextPage = () => {
    if (pagination.value.next_page_url) {
        fetchData(pagination.value.current_page + 1);
    }
};

const sort = (column) => {
    if (sortColumn.value === column) {
        sortOrder.value = sortOrder.value === 'asc' ? 'desc' : 'asc';
    } else {
        sortColumn.value = column;
        sortOrder.value = 'asc';
    }
    fetchData();
};

const arrayToSend = ref([2, 1])
const axiosTest = () => {
    
    
const data = ref({
     student_id: 2,
     country: arrayToSend.value,
   
})
// Now use axios as usual
axios.post('/api/axios-test', data.value)
  .then(response => console.log())
  .catch(error => console.error('Error:', error));
}

onMounted(() => {
    fetchData(1); // Initial fetch
});
</script>
  