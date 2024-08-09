import React from 'react';
import { usePage, useForm } from '@inertiajs/react';
import { useSpring, animated } from 'react-spring';
import DashboardLayout from '../../Layouts/DashboardLayout';
import { Link } from '@inertiajs/react';

const Index = () => {
    const { templates } = usePage().props;
    const [props, set] = useSpring(() => ({ opacity: 0 }));

    React.useEffect(() => {
        set({ opacity: 1 });
    }, [set]);

    return (
        <DashboardLayout>
            <animated.div style={props} className="p-6 bg-white shadow-md rounded-lg">
                <h1 className="text-2xl font-semibold">Email Templates</h1>
                <Link href="/dashboard/email-templates/create" className="mt-4 p-2 bg-blue-500 text-white rounded">Create New Template</Link>
                <table className="mt-4 w-full border-collapse border border-gray-200">
                    <thead>
                        <tr>
                            <th className="border border-gray-300 px-4 py-2">ID</th>
                            <th className="border border-gray-300 px-4 py-2">Name</th>
                            <th className="border border-gray-300 px-4 py-2">Thumbnail</th>
                            <th className="border border-gray-300 px-4 py-2">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        {templates.map(template => (
                            <tr key={template.id}>
                                <td className="border border-gray-300 px-4 py-2">{template.id}</td>
                                <td className="border border-gray-300 px-4 py-2">{template.name}</td>
                                <td className="border border-gray-300 px-4 py-2">{template.thumbnail && <img src={template.thumbnail} alt="Thumbnail" className="w-16 h-16 object-cover" />}</td>
                                <td className="border border-gray-300 px-4 py-2">
                                    <Link href={`/dashboard/email-templates/${template.id}/edit`} className="text-blue-500">Edit</Link>
                                    <button
                                        onClick={() => {
                                            if (confirm('Are you sure you want to delete this template?')) {
                                                Inertia.delete(`/dashboard/email-templates/${template.id}`);
                                            }
                                        }}
                                        className="text-red-500 ml-4"
                                    >
                                        Delete
                                    </button>
                                </td>
                            </tr>
                        ))}
                    </tbody>
                </table>
            </animated.div>
        </DashboardLayout>
    );
};

export default Index;
