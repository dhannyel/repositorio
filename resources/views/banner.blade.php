@php
		$subcategory = $banner->subcategory;
		$category = $subcategory->category;
		$title = $banner->title;
@endphp

<!DOCTYPE html>
<html lang="en">

<head>
		<!-- Required Meta Tags Always Come First -->
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

		<!-- Title -->
		<title>Repositorio de Banners</title>

		<!-- Favicon -->
		<link rel="shortcut icon" href="../../favicon.ico">

		<!-- Font -->
		<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

		<!-- CSS Preline -->
		<link rel="stylesheet" href="https://preline.co/assets/css/main.min.css">

</head>

<body class="bg-gray-50 dark:bg-neutral-900">
		<!-- Header -->
		<x-header :title="$banner->title" :category="$category->name" :subcategory="$subcategory->name" />

		<!-- ========== MAIN CONTENT ========== -->
		<!-- Breadcrumb -->
		<div
				class="sticky top-0 inset-x-0 z-20 bg-white border-y border-gray-200 px-4 sm:px-6 lg:px-8 lg:hidden dark:bg-neutral-800 dark:border-neutral-700">
				<div class="flex items-center py-2">
						<!-- Navigation Toggle -->
						<button type="button"
								class="size-8 flex justify-center items-center gap-x-2 border border-gray-200 text-gray-800 hover:text-gray-500 rounded-lg focus:outline-hidden focus:text-gray-500 disabled:opacity-50 disabled:pointer-events-none dark:border-neutral-700 dark:text-neutral-200 dark:hover:text-neutral-500 dark:focus:text-neutral-500"
								aria-haspopup="dialog" aria-expanded="false" aria-controls="hs-application-sidebar"
								aria-label="Toggle navigation" data-hs-overlay="#hs-application-sidebar">
								<span class="sr-only">Toggle Navigation</span>
								<svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
										viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
										stroke-linejoin="round">
										<rect width="18" height="18" x="3" y="3" rx="2" />
										<path d="M15 3v18" />
										<path d="m8 9 3 3-3 3" />
								</svg>
						</button>
						<!-- End Navigation Toggle -->

						<!-- Breadcrumb -->
						<ol class="ms-3 flex items-center whitespace-nowrap">
								<li class="flex items-center text-sm text-gray-800 dark:text-neutral-400">
										{{ $category->name }}
										<svg class="shrink-0 mx-3 overflow-visible size-2.5 text-gray-400 dark:text-neutral-500" width="16"
												height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
												<path d="M5 1L10.6869 7.16086C10.8637 7.35239 10.8637 7.64761 10.6869 7.83914L5 14" stroke="currentColor"
														stroke-width="2" stroke-linecap="round" />
										</svg>
								</li>
								<li class="flex items-center text-sm text-gray-800 dark:text-neutral-400">
										{{ $subcategory->name }}
										<svg class="shrink-0 mx-3 overflow-visible size-2.5 text-gray-400 dark:text-neutral-500" width="16"
												height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
												<path d="M5 1L10.6869 7.16086C10.8637 7.35239 10.8637 7.64761 10.6869 7.83914L5 14" stroke="currentColor"
														stroke-width="2" stroke-linecap="round" />
										</svg>
								</li>
								<li class="text-sm font-semibold text-gray-800 truncate dark:text-neutral-400" aria-current="page">
										{{ $title }}
								</li>
						</ol>
						<!-- End Breadcrumb -->
				</div>
		</div>
		<!-- End Breadcrumb -->

		<!-- Sidebar -->
		<x-sidebar />

		<!-- End Sidebar -->

		<!-- Content -->
		<div class="w-full lg:ps-64">
				<main class="p-4 sm:p-6 space-y-4 sm:space-y-6">

						<div class="relative flex justify-center items-center py-10">
								<!-- QR flotante (oculto en móviles) -->
								<div
										class="absolute top-4 right-4 bg-white border border-gray-200 shadow-lg rounded-xl p-4 z-10 hidden md:block dark:bg-neutral-800 dark:border-neutral-700">
										{!! QrCode::size(120)->generate($currentUrl) !!}
										<p class="text-xs text-center text-gray-500 mt-2 dark:text-gray-400">Escanea para abrir</p>
								</div>

								<!-- Contenedor con mockup -->
								<div class="relative bg-no-repeat bg-center bg-contain"
										style="
										background-image: url('{{ asset('images/mockup.png') }}');
										background-size: 100% 100%;
										width: {{ $banner->width + 50 }}px;
										height: {{ $banner->height + 100 }}px;
										padding: 0;
										display: flex;
										align-items: center;
										justify-content: center;
								">
										<iframe src="{{ $banner->url }}" style="width: {{ $banner->width }}px; height: {{ $banner->height }}px;"
												class="rounded-md shadow-md border-none" allowfullscreen></iframe>
								</div>
						</div>
				</main>
		</div>
		<!-- End Content -->

		<!-- Required plugins -->
		<script src="https://cdn.jsdelivr.net/npm/preline/dist/index.js"></script>

</body>

</html>
