#include <bits/stdc++.h>
using namespace std;

unordered_map<long long int,long long int> m;

int main() {
	long long int i,j,t1,t2,t3,t4,t,n,temp,ans;
	string s1;
	scanf("%lld",&t);
	while(t--){
	    cin>>s1;
	    m.clear();
	    t2=1e9;
	    sort(s1.begin(),s1.end());
	    while(next_permutation(s1.begin(),s1.end())){
	        temp=0;
	        t2=0;
	        for(auto it=s1.begin();it!=s1.end();it++){
	            t1=*it-'0';
	            t2++;
	            temp+=(t1*t2);
	        }
	        //cout<<temp<<endl;
	        m[temp]++;
	    }
	    temp=0;
	    t2=0;
	    for(auto it=s1.begin();it!=s1.end();it++){
	        t1=*it-'0';
	        t2++;
            temp+=(t1*t2);
	    }
	    m[temp]++;
	    ans=0;
	    for(auto it2=m.begin();it2!=m.end();it2++){
	        t1=it2->second;
	        ans=max(ans,t1);
	    }
	    printf("%lld\n",ans);
	}
	return 0;
}
