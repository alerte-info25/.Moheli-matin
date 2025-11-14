// Menu Toggle
const menuToggle = document.getElementById('menuToggle');
const sidebar = document.getElementById('sidebar');
const sidebarOverlay = document.getElementById('sidebarOverlay');

menuToggle.addEventListener('click', () => {
    sidebar.classList.toggle('active');
    sidebarOverlay.classList.toggle('active');
});

sidebarOverlay.addEventListener('click', () => {
    sidebar.classList.remove('active');
    sidebarOverlay.classList.remove('active');
});

// Ad Image Upload
const adImageUpload = document.getElementById('adImageUpload');
const adImage = document.getElementById('adImage');
const adImagePreview = document.getElementById('adImagePreview');
const adImagePreviewImg = document.getElementById('adImagePreviewImg');
const changeAdImage = document.getElementById('changeAdImage');
const removeAdImage = document.getElementById('removeAdImage');

adImageUpload.addEventListener('click', () => adImage.click());
adImage.addEventListener('change', handleImageSelect);
changeAdImage.addEventListener('click', () => adImage.click());
removeAdImage.addEventListener('click', removeImage);

function handleImageSelect(e) {
    const file = e.target.files[0];
    if (!file) return;

    if (!file.type.match('image.*')) {
        alert('Veuillez sélectionner une image valide');
        return;
    }

    const reader = new FileReader();
    reader.onload = function(e) {
        adImagePreviewImg.src = e.target.result;
        adImagePreview.classList.add('active');
        updateAdPreview();
    };
    reader.readAsDataURL(file);
}

function removeImage() {
    adImage.value = '';
    adImagePreview.classList.remove('active');
    adImagePreviewImg.src = '';
    updateAdPreview();
}

function addTag(text) {
    const tag = document.createElement('div');
    tag.className = 'tag';
    tag.innerHTML = `
        ${text}
        <button type="button" class="tag-remove" onclick="removeTag('${text}')">
            <i class="fas fa-times"></i>
        </button>
    `;
    tagsContainer.insertBefore(tag, tagInput);
}

window.removeTag = function(text) {
    const index = tags.indexOf(text);
    if (index > -1) {
        tags.splice(index, 1);
    }
    const tagElements = tagsContainer.querySelectorAll('.tag');
    tagElements.forEach(tag => {
        if (tag.textContent.includes(text)) {
            tag.remove();
        }
    });
};

// Format Selection
const formatRadios = document.querySelectorAll('input[name="format"]');
const widthInput = document.getElementById('adWidth');
const heightInput = document.getElementById('adHeight');

formatRadios.forEach(radio => {
    radio.addEventListener('change', function() {
        if (this.value === 'banner') {
            widthInput.value = 728;
            heightInput.value = 90;
        } else if (this.value === 'leaderboard') {
            widthInput.value = 970;
            heightInput.value = 90;
        } else if (this.value === 'halfpage') {
            widthInput.value = 300;
            heightInput.value = 600;
        }
        updateAdPreview();
    });
});

// Update Ad Preview
function updateAdPreview() {
    const width = widthInput.value;
    const height = heightInput.value;
    const adPreview = document.getElementById('adPreview');
    
    adPreview.style.width = `${width}px`;
    adPreview.style.height = `${height}px`;
    
    if (adImagePreviewImg.src) {
        adPreview.innerHTML = `<img src="${adImagePreviewImg.src}" alt="Ad Preview" style="width: 100%; height: 100%; object-fit: cover;">`;
    } else {
        adPreview.innerHTML = `
            <div class="ad-preview-content">
                <p>Aperçu de votre publicité</p>
                <small>${width} x ${height} px</small>
            </div>
        `;
    }
}

// Initialize ad preview
updateAdPreview();

// Update preview when dimensions change
widthInput.addEventListener('input', updateAdPreview);
heightInput.addEventListener('input', updateAdPreview);

// Additional CSS for ad preview
const style = document.createElement('style');
style.textContent = `
    .ad-preview-container {
        border: 2px solid var(--medium-gray);
        border-radius: 12px;
        padding: 1.5rem;
        background: var(--light-gray);
        display: flex;
        justify-content: center;
        align-items: center;
        overflow: auto;
    }
    
    .ad-preview {
        background: var(--white);
        border: 1px solid var(--medium-gray);
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        transition: all 0.3s ease;
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    }
    
    .ad-preview-content {
        padding: 1rem;
    }
    
    .ad-preview-content p {
        margin: 0;
        font-weight: 600;
        color: var(--primary-blue);
    }
    
    .ad-preview-content small {
        color: var(--text-light);
        font-size: 0.8rem;
    }
`;
document.head.appendChild(style);

// Loader
window.addEventListener('load', function() {
    let progress = 0;
    const progressBar = document.getElementById('loadingProgress');
    const loader = document.getElementById('loader');
    
    const interval = setInterval(() => {
        progress += 5;
        progressBar.style.width = progress + '%';
        
        if (progress >= 100) {
            clearInterval(interval);
            setTimeout(() => {
                loader.style.opacity = '0';
                setTimeout(() => {
                    loader.style.display = 'none';
                }, 500);
            }, 200);
        }
    }, 30);
});