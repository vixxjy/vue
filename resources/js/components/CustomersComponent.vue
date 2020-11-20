<template>
    <div>
        <h2>Customers</h2>
        <form @submit.prevent="addCustomer()" class="mb-3">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Name" v-model="customer.name">
            </div>
            <div class="form-group">
                <textarea type="text" class="form-control" placeholder="Customer Address" v-model="customer.address"></textarea>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Loan Type" v-model="customer.loan_type" value="Short">
            </div>
            <button class="btn btn-primary btn-sm">Add Customer</button>
        </form>
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <li v-bind:class="[{disabled: !pagination.prev_page_url}]"  class="page-item"><a class="page-link" @click="fetchCustomers(pagination.prev_page_url)">Previous</a></li>
                <li class="page-item disabled"><a class="page-link text-dark" href="#"> Page {{ pagination.current_page }} of {{ pagination.last_page }}</a></li>
                <li v-bind:class="[{disabled: !pagination.next_page_url}]" class="page-item"><a class="page-link" @click="fetchCustomers(pagination.next_page_url)">Next</a></li>
            </ul>
        </nav>
        <div class="card card-body mb-2" v-for="customer in customers" v-bind:key="customer.id">
            <h3>{{ customer.name}}</h3>
            <p>{{ customer.address}}</p>
            <span>{{ customer.loan_type}}</span>
            <hr>
            <button @click="editCustomer(customer)" class="btn btn-warning mb-2">Edit</button>
            <button @click="deleteCustomer(customer.id)" class="btn btn-danger">Delete</button>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            customers: [],
            customer: {
                id: '',
                name: '',
                address: '',
                loan_type: ''
            },
            customer_id: '',
            pagination: {},
            edit: false
        }
    },

    created() {
        this.fetchCustomers();
    },

    methods: {
        fetchCustomers(page_url) {
            let vm = this;

            page_url = page_url || 'api/customers'
            fetch(page_url)
            .then(res => res.json())
            .then(res => {
                //console.log(res.data)
                this.customers = res.data
                vm.makePagination(res.meta, res.links);
            })
            .catch(err => console.log(err)); 
        },

        makePagination(meta, links) {
            let pagination = {
                current_page: meta.current_page,
                last_page: meta.last_page,
                next_page_url: links.next,
                prev_page_url: links.prev
            }

            this.pagination = pagination
        },

        deleteCustomer(id)
        {
            if (confirm('Are you Sure?')) {
                fetch(`api/customer/${id}`, {
                    method: 'delete'
                })
                .then(res => res.json())
                .then(data => {
                    alert('customer deleted Successfully')
                    this.fetchCustomers();
                })
                .catch(err => console.log(err));

            }
        },

        addCustomer() 
        {
            if (this.edit === false) {
                fetch('api/customer', {
                    method: 'post',
                    body: JSON.stringify(this.customer),
                    headers: {
                        'content-type': 'application/json'
                    }
                })
                .then(res => res.json())
                .then(data => {
                    this.customer.name = '';
                    this.customer.address = '';
                    this.customer.loan_type = '';
                    alert('customer added Successfully')
                    this.fetchCustomers();
                })
                 .catch(err => console.log(err));
            }else{
                 fetch('/api/customer', {
                    method: 'put',
                    body: JSON.stringify(this.customer),
                    headers: {
                        'content-type': 'application/json'
                    }
                })
                .then(res => res.json())
                .then(data => {
                    this.customer.name = '';
                    this.customer.address = '';
                    this.customer.loan_type = '';
                    alert('customer updated Successfully')
                    //this.fetchCustomers();
                })
                 .catch(err => console.log(err));
            }
        },

        editCustomer(customer) {
            this.edit = true;
            this.customer.id = customer.id;
            this.customer.name = customer.name;
            this.customer.address = customer.address;
            this.customer.loan_type = customer.loan_type;
        }
    }
}
</script>