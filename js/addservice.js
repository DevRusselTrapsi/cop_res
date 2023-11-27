 
  function addInputForm() {
            const formContainer = document.getElementById('formContainer');
            const inputForm = document.createElement('div');
            inputForm.className = 'input_group';
            inputForm.innerHTML = `

                            <div>
                                <input type="text" class="input" name="type_of_service[]">
                            </div>
                            <div>
                                <input type="text" class="input" name="description[]">
                            </div>
                            <div>
                                <input type="text" class="input" name="service_rates[]">
                            </div>
                            
            `;
            formContainer.appendChild(inputForm);
        }

        // Function to remove the last input form
        function removeInputForm() {
            const formContainer = document.getElementById('formContainer');
            const inputForms = formContainer.getElementsByClassName('input_group');
            if (inputForms.length > 0) {
                formContainer.removeChild(inputForms[inputForms.length - 1]);
            }
        }

        // Add event listeners to the buttons
        document.getElementById('addButton').addEventListener('click', addInputForm);
        document.getElementById('removeButton').addEventListener('click', removeInputForm);