import React from 'react';
import { Link } from '@inertiajs/react';
import DashboardLayout from '../../Layouts/DashboardLayout';

const TemplatesList = ({ templates }) => (
    <DashboardLayout>
        <div className="flex flex-col h-screen bg-gray-100">
            <div className="py-8 px-6 sm:px-8 lg:px-10">
                <div className="flex justify-between items-center mb-8">
                    <h1 className="text-4xl font-extrabold text-gray-900">Templates</h1>
                    <Link
                        href="/templates/create"
                        className="inline-flex items-center px-5 py-2 border border-transparent text-sm font-medium rounded-lg shadow-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition duration-150 ease-in-out"
                    >
                        Create New Template
                    </Link>
                </div>
                <div className="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                    {templates.length === 0 ? (
                        <div className="col-span-full text-center text-gray-500">No templates available</div>
                    ) : (
                        templates.map((template) => (
                            <div key={template.id} className="bg-white shadow-lg rounded-lg overflow-hidden">
                                <img
                                    src={`https://via.placeholder.com/300x200?text=${encodeURIComponent(template.name)}`} // Dummy image URL
                                    alt={template.name}
                                    className="w-full h-48 object-cover"
                                />
                                <div className="p-6">
                                    <h2 className="text-lg font-medium text-gray-900">{template.name}</h2>
                                    <p className="mt-2 text-gray-600">{template.description}</p>
                                    <div className="mt-4 flex space-x-4">
                                        <Link
                                            href={`/templates/${template.id}/edit`}
                                            className="inline-flex items-center px-5 py-2 border border-transparent text-sm font-medium rounded-lg shadow-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition duration-150 ease-in-out"
                                        >
                                            Edit
                                        </Link>
                                        <Link
                                            href={`/templates/${template.id}`}
                                            className="inline-flex items-center px-5 py-2 border border-transparent text-sm font-medium rounded-lg shadow-md text-black bg-indigo-100 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition duration-150 ease-in-out"
                                        >
                                            View
                                        </Link>
                                    </div>
                                </div>
                            </div>
                        ))
                    )}
                </div>
            </div>
        </div>
    </DashboardLayout>
);

export default TemplatesList;
