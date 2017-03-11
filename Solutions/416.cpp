#include <bits/stdc++.h>
using namespace std;
 
int main()
{
    
    long int n,i,sum=0,sum1=0,ans=0,ans1=0;
    cin>>n;
    long arr[n];
    for(i=0;i<n;i++)
        {cin>>arr[i];
        sum+=arr[i];
        ans+=sum;
        }
    sort(arr, arr+n);
    for (int i = 0; i < n; ++i)
       { 
           sum1+=arr[i];
        ans1+=sum1;}
    cout<<(ans-ans1);
 
    return 0;
}