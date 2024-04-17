<template>
    <AppLayout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Add Task
            </h2>
        </template>
        
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="card">
                        <div class="card-header">
                            Add Task
                            <Link :href="route('tasks')" class="btn btn-primary btn-sm" style="float: right;">Back</Link>
                        </div>
                        <div class="card-body">
                            <form @submit.prevent="storeData">
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" v-model="title" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <input type="text" v-model="description" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="due_date">Due Date</label>
                                    <input type="text" v-model="due_date" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="reminder">Reminder</label>
                                    <input type="text" v-model="reminder" class="form-control">
                                </div>
                                <button type="submit" class="btn btn-success btn-lg">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout.vue';
import { Head, Link, router } from '@inertiajs/vue3';

export default {
    data() {
        return {
            title: '',
            description: '',
            due_date: '',
            reminder: '',
        }
    },
    components:{
        AppLayout,
        Link
    },
    methods: {
        storeData() {
            console.log(this.title, 'this.title');
            router.post(route('tasks.add'), {
                title: this.title,
                description: this.description,
                due_date: this.due_date,
                reminder: this.reminder,
            });
        }
    }
}
</script>
