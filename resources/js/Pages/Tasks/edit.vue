<template>
    <AppLayout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Edit Task
            </h2>
        </template>
        
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="card">
                        <div class="card-header">
                            Edit Task
                            <Link :href="route('tasks')" class="btn btn-primary btn-sm" style="float: right;">Back</Link>
                        </div>
                        <div class="card-body">
                            <form @submit.prevent="updateData">
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
                                <button type="submit" class="btn btn-success btn-lg">Update</button>
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
    props: {
        task:Array,
    },
    data() {
        return {
            title: this.task.title,
            description: this.task.description,
            due_date: this.task.due_date,
            reminder: this.task.reminder,
        }
    },
    components:{
        AppLayout,
        Link
    },
    methods: {
        updateData() {
            router.post(route('tasks.edit', {'id':this.task.id}), {
                title: this.title,
                description: this.description,
                due_date: this.due_date,
                reminder: this.reminder,
            });
        }
    }
}
</script>
