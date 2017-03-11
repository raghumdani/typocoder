#include <bits/stdc++.h>
using namespace std;
 
int main(){
    int i,j,k,l,m,n,t,a[100007];
    long long int x,y;
    cin>>n;
    x=0;y=0;
    for(i=0;i<n;i++)
        {
        cin>>a[i];
        x+=(n-i)*a[i];
    }
    sort(a,a+n);
    for(i=0;i<n;i++)
        {
        y+=(n-i)*a[i];
    }
    cout<<x-y;
    return 0;
} 