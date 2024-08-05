import React from 'react';
import { Head } from '@inertiajs/react';
import AuthLayout from '@/Layouts/AuthLayout';

export default function Login() {
  return (
    <AuthLayout>
      <Head title="Login" />
      <div>
        {/* Your login form goes here */}
        <h2>Login Form</h2>
      </div>
    </AuthLayout>
  );
}
