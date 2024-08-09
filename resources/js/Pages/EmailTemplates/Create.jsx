import React from 'react';
import { useForm } from '@inertiajs/react';
import { useSpring, animated } from 'react-spring';
import DashboardLayout from '../../Layouts/DashboardLayout';
import GrapesJS from 'grapesjs';
import 'grapesjs/dist/css/grapes.min.css';

const Create = () => {
    const { data, setData, post, processing, errors } = useForm({
        name: '',
        content: '',
        thumbnail: ''
    });

    const [props, set] = useSpring(() => ({ opacity: 0 }));

    React.useEffect(() => {
        set({ opacity: 1 });
    }, [set]);

    React.useEffect(() => {
        const editor = GrapesJS.init({
            container: '#editor',
            fromElement: true,
            height: '400px',
            width: 'auto',
            storageManager: false,
        });

        editor.on('component:update', () => {
            setData('content', editor.getHtml());
        });
    }, [setData]);

    const handleSubmit = (e) => {
        e.preventDefault();
        post('/dashboard/email-templates');
    };

    return (
        <DashboardLayout>
            <animated.div style={props} className="p-6 bg-white shadow-md rounded-lg">
                <h1 className="text-2xl font-semibold">Create Email Template</h1>
                <form onSubmit={handleSubmit}>
                    <div className="mb-4">
                        <label htmlFor="name" className="block text-gray-700">Name</label>
                        <input
                            id="name"
                            type="text"
                            value={data.name}
                            onChange={(e) => setData('name', e.target.value)}
                            className="mt-1 block w-full p-2 border border-gray-300 rounded"
                        />
                        {errors.name && <div className="text-red-500 text-sm mt-2">{errors.name}</div>}
                    </div>
                    <div className="mb-4">
                        <label htmlFor="thumbnail" className="block text-gray-700">Thumbnail URL</label>
                        <input
                            id="thumbnail"
                            type="text"
                            value={data.thumbnail}
                            onChange={(e) => setData('thumbnail', e.target.value)}
                            className="mt-1 block w-full p-2 border border-gray-300 rounded"
                        />
                        {errors.thumbnail && <div className="text-red-500 text-sm mt-2">{errors.thumbnail}</div>}
                    </div>
                    <div id="editor" className="mb-4"></div>
                    <button
                        type="submit"
                        disabled={processing}
                        className="p-2 bg-blue-500 text-white rounded"
                    >
                        {processing ? 'Creating...' : 'Create Template'}
                    </button>
                </form>
            </animated.div>
        </DashboardLayout>
    );
};

export default Create;
