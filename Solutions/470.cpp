#include<bits/stdc++.h>
using namespace std;
multiset<int>s,d;
int arr[100005];
int main()
{
    int n;
    cin>>n;
    arr[0]=0;
    long sum=0,sum2=0;
    for(int i=1;i<=n;++i){
        cin>>arr[i];
        s.insert(arr[i]);
        arr[i]=arr[i-1]+arr[i];
        sum+=arr[i];
    }
    set<int>::iterator it,dt;
    int prev;
    int i=0;
    for(it=s.begin();it!=s.end();++it){
        sum2+=(*it)*(s.size()-i);
        ++i;
    }
    cout<<(sum-sum2);
    return 0;
}
