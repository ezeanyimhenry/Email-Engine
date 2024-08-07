import React, { useState } from 'react';
import { Link, useForm } from '@inertiajs/react';
import DashboardLayout from '../../Layouts/DashboardLayout';

const CreateCampaign = ({ templates }) => {
  const { data, setData, post, errors } = useForm({
    title: '',
    content: '',
    email_template_id: '',
    scheduled_at: '',
  });

  const handleSubmit = (e, sendNow = false) => {
    e.preventDefault();
    const formData = { ...data, send_now: sendNow };
    post('/dashboard/campaigns', formData);
  };

  return (
    <DashboardLayout>
      <div className="flex flex-col h-screen bg-gray-100">
        <div className="py-8 px-6 sm:px-8 lg:px-10">
          <h1 className="text-2xl font-semibold text-gray-900">Create New Campaign</h1>
          <div className="mt-6">
            <Link
              href="/dashboard/campaigns"
              className="text-indigo-600 hover:text-indigo-800"
            >
              Back to Campaigns
            </Link>
          </div>
          <form onSubmit={(e) => handleSubmit(e)} className="mt-6">
            <div className="bg-white shadow-lg rounded-lg p-6">
              <div className="mb-4">
                <label htmlFor="title" className="block text-gray-700">Title</label>
                <input
                  type="text"
                  id="title"
                  name="title"
                  value={data.title}
                  onChange={(e) => setData('title', e.target.value)}
                  className="mt-1 block w-full border border-gray-300 rounded-md p-2"
                />
                {errors.title && <p className="text-red-500 text-sm">{errors.title}</p>}
              </div>
              <div className="mb-4">
                <label htmlFor="email_template_id" className="block text-gray-700">Email Template</label>
                <select
                  id="email_template_id"
                  name="email_template_id"
                  value={data.email_template_id}
                  onChange={(e) => setData('email_template_id', e.target.value)}
                  className="mt-1 block w-full border border-gray-300 rounded-md p-2"
                >
                  <option value="">Select a template</option>
                  {templates.map((template) => (
                    <option key={template.id} value={template.id}>{template.name}</option>
                  ))}
                </select>
                {errors.email_template_id && <p className="text-red-500 text-sm">{errors.email_template_id}</p>}
              </div>
              <div className="mb-4">
                <label htmlFor="scheduled_at" className="block text-gray-700">Scheduled At</label>
                <input
                  type="datetime-local"
                  id="scheduled_at"
                  name="scheduled_at"
                  value={data.scheduled_at}
                  onChange={(e) => setData('scheduled_at', e.target.value)}
                  className="mt-1 block w-full border border-gray-300 rounded-md p-2"
                />
                {errors.scheduled_at && <p className="text-red-500 text-sm">{errors.scheduled_at}</p>}
              </div>
              <div className="flex gap-4">
                <button
                  type="submit"
                  className="inline-flex items-center px-5 py-2 border border-transparent text-sm font-medium rounded-lg shadow-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition duration-150 ease-in-out"
                >
                  Create Campaign
                </button>
                <button
                  type="button"
                  onClick={(e) => handleSubmit(e, true)}
                  className="inline-flex items-center px-5 py-2 border border-transparent text-sm font-medium rounded-lg shadow-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition duration-150 ease-in-out"
                >
                  Send Now
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </DashboardLayout>
  );
};

export default CreateCampaign;
