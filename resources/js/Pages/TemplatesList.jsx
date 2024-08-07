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
              href="/dashboard/email-templates/new"
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
                <ul className="divide-y divide-gray-200">
                  {templates.map((template) => (
                    <li key={template.id} className="py-4 flex items-center justify-between">
                      <div className="flex items-center space-x-4">
                        <div className="flex-shrink-0">
                          <img className="h-12 w-12 rounded-full" src={template.thumbnail} alt={template.name} />
                        </div>
                        <div className="min-w-0 flex-1">
                          <p className="text-lg font-medium text-gray-900">{template.name}</p>
                          <p className="text-sm text-gray-500">{template.description}</p>
                        </div>
                      </div>
                      <div className="ml-4 flex-shrink-0">
                        <Link
                          href={`/dashboard/templates/${template.id}/edit`}
                          className="text-indigo-600 hover:text-indigo-800"
                        >
                          Edit
                        </Link>
                      </div>
                    </li>
                  ))}
                </ul>
              )}
            </div>
          </div>
        </div>
      </animated.div>
    </DashboardLayout>
  );
};

export default TemplatesList;
