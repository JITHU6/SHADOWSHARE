<?php
$validatedData = $request->validate([
            'email' => 'required|max:255',
            'password' => 'required',
        ]);