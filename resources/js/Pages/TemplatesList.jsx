import React from 'react';
import { Link } from '@inertiajs/react';
import { useSpring, animated } from 'react-spring';
import DashboardLayout from '../Layouts/DashboardLayout';

const TemplatesList = ({ templates }) => {
  const fadeIn = useSpring({ opacity: 1, from: { opacity: 0 } });

  return (
    <DashboardLayout>
      <animated.div style={fadeIn} className="flex flex-col h-screen bg-gray-100">
        <div className="py-8 px-6 sm:px-8 lg:px-10">
          <div className="flex justify-between items-center mb-8">
            <h1 className="text-4xl font-extrabold text-gray-900">Email Templates</h1>
            <Link
              href="/dashboard/templates/new"
              className="inline-flex items-center px-5 py-2 border border-transparent text-sm font-medium rounded-lg shadow-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition duration-150 ease-in-out"
            >
              New Template
            </Link>
          </div>

          <div className="bg-white shadow-lg rounded-lg overflow-hidden">
            <div className="px-6 py-4">
              {templates.length === 0 ? (
                <p className="text-center text-gray-500">No templates available</p>
              ) : (
                <div className="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                  {templates.map((template) => (
                    <div key={template.id} className="bg-gray-50 rounded-lg shadow-md overflow-hidden">
                      <img
                        className="w-full h-48 object-cover transition-transform duration-300 transform hover:scale-105"
                        src={template.thumbnail}
                        alt={template.name}
                      />
                      <div className="p-4">
                        <h2 className="text-xl font-semibold text-gray-800">{template.name}</h2>
                        <p className="text-sm text-gray-500 mt-2">{template.description}</p>
                        <div className="mt-4">
                          <Link
                            href={`/dashboard/templates/${template.id}/edit`}
                            className="bg-indigo-600 hover:bg-indigo-800 text-white px-4 py-2 rounded-md"
                          >
                            Edit
                          </Link>
                        </div>
                      </div>
                    </div>
                  ))}
                </div>
              )}
            </div>
          </div>
        </div>
      </animated.div>
    </DashboardLayout>
  );
};

export default TemplatesList;
