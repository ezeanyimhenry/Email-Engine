import React from 'react';
import { Link } from '@inertiajs/inertia-react';
import DashboardLayout from '../Layouts/DashboardLayout';
import EmailEditor from '../Components/EmailEditor';

const EmailTemplates = () => {
    return (
        <DashboardLayout>
            <div className="flex flex-col h-full">
                <div className="px-4 py-6 sm:px-6 md:px-8">
                    <h1 className="text-2xl font-semibold text-gray-900">Email Templates</h1>
                    <div className="mt-6">
                        <Link href="/dashboard/email-templates/new" className="text-indigo-600 hover:text-indigo-800">
                            Create New Template
                        </Link>
                    </div>
                    <div className="mt-6">
                        <EmailEditor />
                    </div>
                </div>
            </div>
        </DashboardLayout>
    );
};

export default EmailTemplates;
