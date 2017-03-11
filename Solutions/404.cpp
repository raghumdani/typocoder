#include <bits/stdc++.h> 
using namespace std;
 
int main() { 
    int n;
    long int nonopt = 0, opt = 0;
    cin >> n;
    vector<int> a(n);
    for (int i = 0; i<n; ++i)
    {
        cin >> a[i];
        nonopt = 2*nonopt + a[i];
    }
    sort (a.begin(), a.end());
    for (int i = 0; i<n; ++i)
    {
        opt = opt*2 + a[i];
    }
    cout << nonopt - opt;
    
     
    return(0);
}