<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">

                <!DOCTYPE html>
                <html lang="en">

                <head>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <title>Dashboard</title>
                    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css"
                        rel="stylesheet">
                    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                </head>

                <body class="bg-gray-100">
                    <div class="container mx-auto p-8">
                        <h1 class="text-3xl font-bold mb-6">Dashboard</h1>
                        <!-- Otros componentes del dashboard -->

                        <div class="bg-white p-6 rounded-lg shadow-lg mb-6">
                            <h2 class="text-2xl font-bold mb-4">Usuarios por Departamento</h2>
                            <canvas id="departmentChart"></canvas>
                        </div>
                    </div>

                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            const ctx = document.getElementById('departmentChart').getContext('2d');
                            const departments = @json($departments);

                            const labels = departments.map(department => department.department);
                            const data = departments.map(department => department.total);

                            const chart = new Chart(ctx, {
                                type: 'bar',
                                data: {
                                    labels: labels,
                                    datasets: [{
                                        label: 'Usuarios por Departamento',
                                        data: data,
                                        backgroundColor: 'rgba(54, 162, 235, 0.2)',
                                        borderColor: 'rgba(54, 162, 235, 1)',
                                        borderWidth: 1
                                    }]
                                },
                                options: {
                                    scales: {
                                        y: {
                                            beginAtZero: true
                                        }
                                    }
                                }
                            });
                        });
                    </script>
                </body>

                </html>
            </div>
        </div>
    </div>
</x-app-layout>
