// resources/js/grapesjsBlocks.js
export default function initializeBlocks(editor) {
    const bm = editor.BlockManager;

    // Text Block
    bm.add('text-block', {
        label: 'Text',
        content: '<div class="text-block" style="padding: 10px; border: 1px solid #ddd;">Your text here</div>',
        category: 'Basic',
        attributes: { class: 'gjs-block-title' }
    });

    // Image Block
    bm.add('image-block', {
        label: 'Image',
        content: '<img src="https://via.placeholder.com/150" class="img-block" style="width: 100%; height: auto;" />',
        category: 'Basic',
        attributes: { class: 'gjs-block-title' }
    });

    // Button Block
    bm.add('button-block', {
        label: 'Button',
        content: '<a href="#" class="btn btn-primary" style="display: inline-block; padding: 10px 20px; background-color: #007bff; color: #fff; text-decoration: none; border-radius: 4px;">Button</a>',
        category: 'Basic',
        attributes: { class: 'gjs-block-title' }
    });

    // Video Block
    bm.add('video-block', {
        label: 'Video',
        content: '<div class="video-block" style="position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden;"><iframe src="https://www.youtube.com/embed/tgbNymZ7vqY" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; border: 0;" allowfullscreen></iframe></div>',
        category: 'Basic',
        attributes: { class: 'gjs-block-title' }
    });

    // Form Block
    bm.add('form-block', {
        label: 'Form',
        content: `
            <form class="form-block" style="padding: 10px; border: 1px solid #ddd;">
                <div style="margin-bottom: 10px;">
                    <input type="text" placeholder="Your Name" style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px;" />
                </div>
                <div style="margin-bottom: 10px;">
                    <input type="email" placeholder="Your Email" style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px;" />
                </div>
                <button type="submit" style="background-color: #007bff; color: #fff; padding: 10px 20px; border: none; border-radius: 4px;">Submit</button>
            </form>`,
        category: 'Forms',
        attributes: { class: 'gjs-block-title' }
    });

    // Divider Block
    bm.add('divider-block', {
        label: 'Divider',
        content: '<hr class="divider-block" style="border: 1px solid #ddd; margin: 20px 0;" />',
        category: 'Basic',
        attributes: { class: 'gjs-block-title' }
    });
}
