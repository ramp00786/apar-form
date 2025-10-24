{{-- page 6 --}}
<div class="bg-white/90 backdrop-blur-md shadow rounded mb-8 p-4 px-8">
                <div class="page-number">-6-</div>
                <div class="part-title text-center">GENERAL</div>
                <div class="part-title text-center"><strong>PART-4</strong></div>

                <div style="margin: 20px 0;">
                    <strong>1. Relation with the public (wherever applicable)</strong>
                    <p><em>(Please comment on the Scientist accessibility to the public and responsiveness to their
                            needs)</em></p>
                    <table class="form-table">
                        <tbody>
                            <tr>
                                <td style="height: 400px; padding: 10px; border: 1px solid black;">
                                    {{ $formData['part_4']['relation_with_public'] ?? '' }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div style="margin: 20px 0;">
                    <strong>2. Training</strong>
                    <p><em>(Please give recommendation for training with a view to further improving the effectiveness
                            and capabilities of the Scientist)</em></p>
                    <table class="form-table">
                        <tbody>
                            <tr>
                                <td style="height: 300px; padding: 10px; border: 1px solid black;">
                                    {{ $formData['part_4']['training_recommendation'] ?? '' }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div style="margin: 20px 0;">
                    <strong>3. State of Health</strong>
                    <table class="form-table">
                        <tbody>
                            <tr>
                                <td style="height: 200px; padding: 10px; border: 1px solid black;">
                                    {{ $formData['part_4']['state_of_health'] ?? '' }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            {{-- end page 6 --}}