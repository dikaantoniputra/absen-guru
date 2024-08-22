<div class="col-xl-12">
    <div class="card">
        <h2 class="header-title">Tambah User</h2>
        <div class="card-body">
            <div class="row mb-3">
                <label for="inputEmail3" class="col-4 col-form-label">NIK<span class="text-danger"> *</span></label>
                <div class="col-7">
                    <input type="number" required parsley-type="email" class="form-control" id="nik"
                        name="nik" placeholder="NIK" value="{{ $user->nik ?? '' }}" />
                    @error('nik')
                        <span id="username-error" class="error-message">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="inputEmail3" class="col-4 col-form-label">Nama<span class="text-danger"> *</span></label>
                <div class="col-7">
                    <input type="text" required parsley-type="email" class="form-control" id="name"
                        name="name" placeholder="Nama" value="{{ $user->name ?? '' }}" />
                </div>
            </div>

            <div class="row mb-3">
                <label for="inputEmail3" class="col-4 col-form-label">Username<span class="text-danger">
                        *</span></label>
                <div class="col-7">
                    <input type="text" required parsley-type="email" class="form-control" id="username"
                        name="username" placeholder="Username" value="{{ $user->username ?? '' }}" />
                    @error('username')
                        <span id="username-error" class="error-message">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="inputEmail3" class="col-4 col-form-label">Email<span class="text-danger"> *</span></label>
                <div class="col-7">
                    <input type="email" required parsley-type="email" class="form-control" id="email"
                        name="email" placeholder="Email" value="{{ $user->email ?? '' }}" />

                    @error('email')
                        <span id="username-error" class="error-message">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="inputEmail3" class="col-4 col-form-label">No Whatshapp<span class="text-danger">
                        *</span></label>
                <div class="col-7">
                    <input type="number" required parsley-type="email" class="form-control" id="wa"
                        name="wa" placeholder="No WA" value="{{ $user->wa ?? '' }}" />
                    @error('wa')
                        <span id="username-error" class="error-message">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="hori-pass1" class="col-4 col-form-label">Password<span class="text-danger"> *</span></label>
                <div class="col-7">
                    <div class="input-group">
                        <input id="password" name="password" type="password" placeholder="Password" required class="form-control" value="{{ $user->password ?? '' }}" />
                        <button class="btn btn-outline-secondary" type="button" id="btn-toggle-password"><i class="far fa-eye"></i></button>
                    </div>  
                </div>
            </div>

       
                @if (auth()->user()->role == 'province')
                <div class="row mb-3">
                    <label for="hori-pass2" class="col-4 col-form-label">Jenis Akun <span class="text-danger">*</span></label>
                    <div class="col-7">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1"
                                value="rs" <?php echo ($user2->role === 'rs') ? 'checked' : ''; ?> onclick="toggleRS()">
                            <label class="form-check-label" for="inlineRadio1">RS</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2"
                                value="sub-rs" <?php echo ($user2->role === 'sub-rs') ? 'checked' : ''; ?> onclick="toggleRS()">
                            <label class="form-check-label" for="inlineRadio2">Sub-Rs</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2"
                                value="daerah" <?php echo ($user2->role === 'daerah') ? 'checked' : ''; ?> onclick="toggleDaerah()">
                            <label class="form-check-label" for="inlineRadio2">Daerah</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2"
                                value="sub-daerah" <?php echo ($user2->role === 'sub-daerah') ? 'checked' : ''; ?> onclick="toggleDaerah()">
                            <label class="form-check-label" for="inlineRadio2">Sub-Daerah</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3"
                                value="province" disabled>
                            <label class="form-check-label" for="inlineRadio3">(Admin Provinsi)</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1"
                                value="bpjs" <?php echo ($user2->role === 'bpjs') ? 'checked' : ''; ?> onclick="toggleBpjs()">
                            <label class="form-check-label" for="inlineRadio1">BPJS</label>
                        </div>
                      
                    </div>
                </div>
                @endif
                @if (auth()->user()->role == 'rs')
                <div class="row mb-3">
                    <label for="hori-pass2" class="col-4 col-form-label">Jenis Akun <span class="text-danger">*</span></label>
                    <div class="col-7">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1"
                                value="rs" <?php echo ($user2->role === 'rs' || $user2->role === 'sub-rs') ? 'checked' : ''; ?> >
                            <label class="form-check-label" for="inlineRadio1">RS</label>

                        </div>
                        
                    </div>
                </div>
                @endif

                @if (auth()->user()->role == 'daerah')
                <div class="row mb-3">
                    <label for="hori-pass2" class="col-4 col-form-label">Jenis Akun <span class="text-danger">*</span></label>
                    <div class="col-7">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1"
                                value="daerah" <?php echo ($user2->role === 'daerah' || $user2->role === 'sub-daerah') ? 'checked' : ''; ?> >
                            <label class="form-check-label" for="inlineRadio1">Dispenduk</label>
                        </div>
                        
                    </div>
                </div>
                @endif


            <div class="row mb-3" id="div-rs" style="display:none;">
                <label for="hori-pass2" class="col-4 col-form-label">Rumah Sakit <span
                        class="text-danger">*</span></label>
                <div class="col-7">
                    <select class="form-select" id="role" name="hospital_id">
                        <option value="">Pilih Rs</option>
                        @foreach ($hospital as $r)
                     
                        <option value="{{ $r->id }}"
                            {{ isset($user) && $user->hospital_id == $r->id ? 'selected' : (old('hospital') == $r->id ? 'selected' : '') }}>
                            {{ $r->name_hospital }}</option>
                        @endforeach
                    
                    </select>
                </div>
            </div>

            <div class="row mb-3" id="div-daerah" style="display:none;">
                <!-- Tambahkan id dan style="display:none;" untuk menyembunyikan elemen ini secara default -->
                <label for="hori-pass2" class="col-4 col-form-label">Daerah <span
                        class="text-danger">*</span></label>
                <div class="col-7">
                    <select class="form-select select2" id="regency" name="regency_id">
                        <option value="">-- Pilih kota/kabupaten --</option>
                        @foreach ($regencies as $r)
                            <option value="{{ $r->id }}"
                                {{ !empty($user) && $user->regency_id == $r->id ? 'selected' : (old('regency') == $r->id ? 'selected' : '') }}>
                                {{ $r->name }}</option>
                        @endforeach
                    </select>

                </div>
            </div>

            <div class="row mb-3">
                <label for="hori-pass2" class="col-4 col-form-label">Role <span class="text-danger">*</span></label>
                <div class="col-7">
                    @if (auth()->user()->role == 'province')
                    <select class="form-select select2" aria-label=".form-select-lg example" name="role">
                        <option value="rs" <?php echo ($user2->role === 'rs') ? 'selected' : ''; ?>>RS</option>
                        <option value="sub-rs" <?php echo ($user2->role === 'sub-rs') ? 'selected' : ''; ?>>SUB RS</option>
                        <option value="daerah" <?php echo ($user2->role === 'daerah') ? 'selected' : ''; ?>>Daerah</option>
                        <option value="sub-daerah" <?php echo ($user2->role === 'sub-daerah') ? 'selected' : ''; ?>>SUB Dispenduk</option>
                        <option value="province" <?php echo ($user2->role === 'province') ? 'selected' : ''; ?>>Province</option>
                        <option value="bpjs" <?php echo ($user2->role === 'bpjs') ? 'selected' : ''; ?>>BPJS</option>
                    </select>
                    @endif
                    @if (auth()->user()->role == 'rs')
                    <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="role">
                        <option value="sub-rs" <?php echo ($user2->role === 'sub-rs') ? 'selected' : ''; ?>>SUB RS</option>
                        
                    </select>
                    @endif
                    @if (auth()->user()->role == 'daerah')
                    <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="role">
                        <option value="sub-daerah" <?php echo ($user2->role === 'sub-daerah') ? 'selected' : ''; ?>>SUB Dispenduk</option>
                        
                    </select>
                    @endif
                </div>
            </div>

            <div class="row mb-3">
                    <label for="hori-pass2" class="col-4 col-form-label">Status Akun <span class="text-danger">*</span></label>
                    <div class="col-7">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status" id="inlineRadio1"
                                value="1" <?php echo ($user2->status === '1') ? 'checked' : ''; ?> >
                            <label class="form-check-label" for="inlineRadio1">Aktif</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status" id="inlineRadio2"
                                value="0" <?php echo ($user2->status === '0') ? 'checked' : ''; ?> >
                            <label class="form-check-label" for="inlineRadio2">Non Aktif</label>
                        </div>
                    </div>
                </div>

            <div class="row mb-3">
                <div class="col-8 offset-4">
                    <button type="submit" class="btn btn-primary waves-effect waves-light">Simpan</button>
                    <button type="reset" class="btn btn-secondary waves-effect">Reset</button>
                </div>
            </div>
        </div><!-- end card-body -->
    </div> <!-- end card-->
</div> <!-- end col -->
