 
  function addAccom() {
            const formContainer = document.getElementById('formContainer3');
            const inputForm = document.createElement('div');
            inputForm.className = 'input_group3';
            inputForm.innerHTML = `

                           <div>
                                    <input type="text" class="input" name="type_of_room[]" required>
                                </div>
                                <div>
                                    <input type="text" class="input" name="no_accom_units[]" required>
                                </div>
                                <div>
                                    <input type="text" class="input" name="accom_capacity[]" required>
                                </div>
                                <div>
                                    <input type="text" class="input" name="accom_rates[]" required>
                                </div>
                                <div>
                                    <input type="file" class="insert_img" id="input_file" name="acom_url[]" 
                                    accept="image/png, image/jpg, image/jpeg, image/PNG" 
                                    style="background-color: white; cursor: pointer;"
                                     required>
                                </div>
                            
            `;
            formContainer.appendChild(inputForm);
        }

        // Function to remove the last input form
        function removeAccom() {
            const formContainer = document.getElementById('formContainer3');
            const inputForms = formContainer.getElementsByClassName('input_group3');
            if (inputForms.length > 0) {
                formContainer.removeChild(inputForms[inputForms.length - 1]);
            }
        }

        // Add event listeners to the buttons
        document.getElementById('addaccom').addEventListener('click', addAccom);
        document.getElementById('removeaccom').addEventListener('click', removeAccom);