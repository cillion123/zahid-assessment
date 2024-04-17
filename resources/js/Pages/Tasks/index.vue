<script>
import AppLayout from '@/Layouts/AppLayout.vue';
import { Head, Link, router } from '@inertiajs/vue3';

export default {
    components:{
        AppLayout,
        Link
    },
    props: {
        tasks: Array,
    },
}
</script>

<template>
    <AppLayout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Tasks
            </h2>
        </template>
        
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="card">
                        <div class="card-header">
                            Tasks
                            <Link :href="route('tasks.add')" class="btn btn-primary btn-sm" style="float: right;">Add</Link>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped table-responsive">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Status</th>
                                        <th>Due Date</th>
                                        <th>Reminder</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="task in tasks">
                                        <td>{{ task.title }}</td>
                                        <td>{{ task.description }}</td>
                                        <td>{{ task.status }}</td>
                                        <td>{{ task.due_date }}</td>
                                        <td>{{ task.reminder }}</td>
                                        <td>
                                            <Link :href="route('tasks.edit', {'id':task.id})" class="btn btn-primary btn-sm">Edit</Link>
                                            <Link :href="route('tasks.delete', {'id':task.id})" class="btn btn-primary btn-sm">Delete</Link>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
