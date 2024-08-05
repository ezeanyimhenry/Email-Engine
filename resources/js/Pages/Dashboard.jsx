import React from 'react';
import { Head } from '@inertiajs/react';
import DashboardLayout from '@/Layouts/DashboardLayout';

export default function Dashboard() {
  return (
    <DashboardLayout>
      <Head title="Dashboard" />
      <div>
        <h1 className="text-2xl font-semibold text-gray-900">Dashboard</h1>
        {/* Dashboard content goes here */}
      </div>
    </DashboardLayout>
  );
}
