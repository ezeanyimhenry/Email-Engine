import React, { useRef, useEffect } from 'react';
import { useForm } from '@inertiajs/react';
import grapesjs from 'grapesjs';
import 'grapesjs/dist/css/grapes.min.css';
import DashboardLayout from '../../Layouts/DashboardLayout';
import initializeBlocks from '../../grapesjsBlocks';

const CreateTemplate = () => {
    const { data, setData, post, errors } = useForm({
        name: '',
        content: '',
    });

    const editorRef = useRef(null);

    useEffect(() => {
        const editor = grapesjs.init({
            container: editorRef.current,
            fromElement: false,
            storageManager: false,
            plugins: ['grapesjs-preset-webpage'],
            pluginsOpts: {
                'grapesjs-preset-webpage': {},
            },
            canvas: {
                styles: [
                    'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css',
                ],
            },
        });

        // Initialize custom blocks
        initializeBlocks(editor);

        // Set default content
        editor.setComponents('<div class="container"><h1>Hello World</h1></div>');

        editor.on('component:update', () => {
            setData('content', editor.getHtml());
        });
    }, []);

    const handleSubmit = (e) => {
        e.preventDefault();
        post('/templates');
    };

    return (
        <DashboardLayout>
            <div className="flex flex-col h-screen bg-gray-100">
                <div className="py-8 px-6 sm:px-8 lg:px-10">
                    <h1 className="text-2xl font-semibold text-gray-900">Create New Template</h1>
                    <form onSubmit={handleSubmit} className="mt-6">
                        <div className="bg-white shadow-lg rounded-lg p-6">
                            <div className="mb-4">
                                <label htmlFor="name" className="block text-gray-700">Name</label>
                                <input
                                    type="text"
                                    id="name"
                                    name="name"
                                    value={data.name}
                                    onChange={(e) => setData('name', e.target.value)}
                                    className="mt-1 block w-full border border-gray-300 rounded-md p-2"
                                />
                                {errors.name && <p className="text-red-500 text-sm">{errors.name}</p>}
                            </div>
                            <div className="mb-4">
                                <label htmlFor="content" className="block text-gray-700">Content</label>
                                <div ref={editorRef} className="h-96 bg-white" />
                                {errors.content && <p className="text-red-500 text-sm">{errors.content}</p>}
                            </div>
                            <button
                                type="submit"
                                className="inline-flex items-center px-5 py-2 border border-transparent text-sm font-medium rounded-lg shadow-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition duration-150 ease-in-out"
                            >
                                Create Template
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </DashboardLayout>
    );
};

export default CreateTemplate;
