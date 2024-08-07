import React from 'react';
import { Head, Link, useForm } from '@inertiajs/react';
import DashboardLayout from '../Layouts/DashboardLayout';

const ServerConfiguration = ({ config }) => {
  const { data, setData, post, processing, errors } = useForm({
    name: config?.name || '',
    host: config?.host || '',
    username: config?.username || '',
    password: '',
    encryption: config?.encryption || 'ssl',
    port: config?.port || '',
    logo: null
  });

  const handleSubmit = (e) => {
    e.preventDefault();
    post('/dashboard/server-config');
  };

  const handleLogoUpload = (e) => {
    e.preventDefault();
    const formData = new FormData();
    formData.append('logo', data.logo);
    post('/dashboard/server-config/upload-logo', formData, {
      headers: {
        'Content-Type': 'multipart/form-data'
      }
    });
  };

  return (
    <DashboardLayout>
      <Head title="Server Configuration" />
      <div className="py-8 px-6 sm:px-8 lg:px-10">
        <h1 className="text-2xl font-semibold text-gray-900">Server Configuration</h1>

        <form onSubmit={handleSubmit} className="mt-6">
          <div className="mb-4">
            <label htmlFor="name" className="block text-sm font-medium text-gray-700">Server Name</label>
            <input
              type="text"
              id="name"
              name="name"
              value={data.name}
              onChange={e => setData('name', e.target.value)}
              className="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
            />
            {errors.name && <p className="text-red-500 text-xs mt-1">{errors.name}</p>}
          </div>

          <div className="mb-4">
            <label htmlFor="host" className="block text-sm font-medium text-gray-700">Host</label>
            <input
              type="text"
              id="host"
              name="host"
              value={data.host}
              onChange={e => setData('host', e.target.value)}
              className="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
            />
            {errors.host && <p className="text-red-500 text-xs mt-1">{errors.host}</p>}
          </div>

          <div className="mb-4">
            <label htmlFor="username" className="block text-sm font-medium text-gray-700">Username</label>
            <input
              type="text"
              id="username"
              name="username"
              value={data.username}
              onChange={e => setData('username', e.target.value)}
              className="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
            />
            {errors.username && <p className="text-red-500 text-xs mt-1">{errors.username}</p>}
          </div>

          <div className="mb-4">
            <label htmlFor="password" className="block text-sm font-medium text-gray-700">Password</label>
            <input
              type="text"
              id="password"
              name="password"
              value={data.password}
              onChange={e => setData('password', e.target.value)}
              className="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
            />
            {errors.password && <p className="text-red-500 text-xs mt-1">{errors.password}</p>}
          </div>

          <div className="mb-4">
            <label htmlFor="encryption" className="block text-sm font-medium text-gray-700">Encryption</label>
            <select
              id="encryption"
              name="encryption"
              value={data.encryption}
              onChange={e => setData('encryption', e.target.value)}
              className="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
            >
              <option value="ssl">SSL</option>
              <option value="tls">TLS</option>
            </select>
            {errors.encryption && <p className="text-red-500 text-xs mt-1">{errors.encryption}</p>}
          </div>

          <div className="mb-4">
            <label htmlFor="port" className="block text-sm font-medium text-gray-700">Port</label>
            <input
              type="number"
              id="port"
              name="port"
              value={data.port}
              onChange={e => setData('port', e.target.value)}
              className="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
            />
            {errors.port && <p className="text-red-500 text-xs mt-1">{errors.port}</p>}
          </div>

          <button
            type="submit"
            disabled={processing}
            className="inline-flex items-center px-4 py-2 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
          >
            {processing ? 'Saving...' : 'Save Configuration'}
          </button>
        </form>

        <div className="mt-8">
          <h2 className="text-lg font-semibold text-gray-900">Upload Logo</h2>
          <form onSubmit={handleLogoUpload} encType="multipart/form-data" className="mt-6">
            <div className="mb-4">
              <label htmlFor="logo" className="block text-sm font-medium text-gray-700">Logo</label>
              <input
                type="file"
                id="logo"
                name="logo"
                onChange={e => setData('logo', e.target.files[0])}
                className="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
              />
              {errors.logo && <p className="text-red-500 text-xs mt-1">{errors.logo}</p>}
            </div>

            <button
              type="submit"
              disabled={processing}
              className="inline-flex items-center px-4 py-2 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
            >
              {processing ? 'Uploading...' : 'Upload Logo'}
            </button>
          </form>
        </div>
      </div>
    </DashboardLayout>
  );
};

export default ServerConfiguration;
